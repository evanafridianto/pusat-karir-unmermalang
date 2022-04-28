<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Address;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function index(Request $request)
    {

        $user = User::where('username', Auth::user()->username)->first();
        if ($user) {
            $data = [
                'title'  => 'Profil Perusahaan',
                'profile' => $user->userable,
                'account' => $user,
                'business_fields' => Category::where('type', 'Business Field')->orderBy('name', 'asc')->get(),
                'provinces' => Province::get(),
            ];
            return view('admin.pages.profile.form', $data);
        } else {
            abort(404);
        }
    }

    public function account(Request $request, $username)
    {
        $user = User::where('username', $username)->first();
        if (Auth::user()->username == $user->username) {
            if ($request->ajax()) {
                return response()->json($user);
            }
        }
    }

    public function store(Request $request, $step)
    {
        if ($step == 0) {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string|max:255',
                'tin' =>  'required|numeric|digits:15',
                // 'tin' =>  'required|numeric',
                'since' =>  'required',
                'business_scale' => 'required',
                'business_field' => 'required',
                'number_of_employee' => 'required',
                'website' => 'url|nullable',
                'description' => 'string|nullable|max:600',
                'logo' => 'image|mimes:jpeg,jpg,png,gif|max:5120|nullable',
                'telp' =>  'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'next' => false]);
            } else {
                return response()->json(['next' => true]);
            };
        } elseif ($step == 1) {
            $validator = Validator::make($request->all(), [
                'province' => 'required',
                'city' => 'required',
                'street' => 'required',
                'zip_code' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'status' => false]);
            } else {
                $employer =  Employer::find($request->id);
                $employer->company_name = $request->company_name;
                $employer->since = $request->since;
                $employer->website = $request->website;
                $employer->description = $request->description;
                $employer->telp = $request->telp;
                $employer->tin = $request->tin;
                $employer->business_scale = $request->business_scale;
                $employer->category_id = $request->business_field;
                $employer->number_of_employee = $request->number_of_employee;

                if ($request->hasFile('logo')) {
                    if (Storage::exists('public/logo/' . $request->old_logo) && !empty($request->old_logo)) {
                        Storage::delete('public/logo/' . $request->old_logo);
                    }
                    $name = Str::slug($request->company_name) . '_' . Carbon::now()->timestamp . '.' . $request->file('logo')->getClientOriginalExtension();
                    $employer->logo = $name;
                    $request->file('logo')->storeAs('logo', $name, 'public');
                }

                $address =  Address::find($request->address_id);
                $address->province_id = $request->province;
                $address->city_id = $request->city;
                $address->street = $request->street;
                $address->zip_code = $request->zip_code;


                DB::beginTransaction();
                try {
                    $employer->save();
                    $employer->address()->save($address);

                    DB::commit();
                    return response()->json(['status' => true]);
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            };
        } else if ($step == 'account') {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email:rfc,dns|unique:users,email,' . $request->account_id,
                'username' => 'required|string|max:255|alpha_dash|unique:users,username,' . $request->account_id,
                'password' => 'required|min:6|max:255', Rules\Password::defaults(),
                'password_confirmation' => 'required|same:password',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'status' => false]);
            } else {
                $user =  User::find($request->account_id);
                $user->email  = $request->email;
                $user->username  = $request->username;
                $user->password = Hash::make($request->password);
                $user->save();
                // $user->attachRole($request->role);
                return response()->json(['status' => true]);
            };
        }
    }

    public function logo_destroy($name)
    {
        if (Storage::exists('public/logo/' . $name)) {
            Storage::delete('public/logo/' . $name);
        }
        return response()->json(['status' => true]);
    }
}