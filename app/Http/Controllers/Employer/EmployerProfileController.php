<?php

namespace App\Http\Controllers\Employer;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\User;
use App\Models\Address;
use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Employer;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\ApplicantVacancy;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class EmployerProfileController extends Controller
{

    public function __construct()
    {
        $pages = Page::where('carousel', '0')->where('status', 'active')->get();
        View::share(compact('pages'));
    }

    public function index(Request $request, $username)
    {
        $user = User::where('username', $username)->first();
        if ($user || Auth::user()->username == $username) {
            $vacancies = Vacancy::with('employers:id,company_name', 'categories:slug,name')->withCount('applicants')->where('employer_id', $user->userable->id);
            $data = [
                'title'  => 'Profile',
                'profile' => $user->userable,
                'account' => $user,
                'address' => $user->userable->address,
                'categories' => Category::where('type', 'Major')->orderBy('name', 'asc')->get(),
                'vacancies' => $vacancies->latest()->filter($request)->paginate(5)->withQueryString(),
                'vacancies_count' => Vacancy::where('employer_id', $user->userable->id)->count(),
                'applicants_count' => Applicant::applicationcount($user->userable->id)->count(),
            ];
            return view('employer.profile', $data);
        } else {
            return abort(404);
        }
    }

    public function get(Request $request, $id)
    {
        if ($request->ajax()) {
            $employer = Employer::where('id', $id)->with('address')->first();
            return response()->json($employer);
        }
    }

    public function edit(Request $request, $username, $edit)
    {
        $user = User::where('username', $username)->first();
        if ($user && $edit == 'profile' || $edit == 'account' && Auth::user()->username == $username) {
            $data = [
                'title'  => $edit == 'profile' ? 'Edit Profil' : 'Edit Akun',
                'profile' => $user->userable,
                'account' => $user,
                'business_fields' => Category::where('type', 'Business Field')->orderBy('name', 'asc')->get(),
                'provinces' => Province::get(),
                'edit' =>  $edit
            ];
            return view('employer.edit', $data);
        } else {
            abort(404);
        }
    }

    public function store(Request $request, $step)
    {
        if ($step == 0) {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string|max:255',
                'tin' =>  'required|numeric|digits:15',
                'tin' =>  'required|numeric',
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
                'email' => 'required|email:rfc,dns|unique:users,email,' . $request->user_id,
                'username' => 'required|string|max:255|alpha_dash|unique:users,username,' . $request->user_id,
                'password' => 'required|min:6|max:255', Rules\Password::defaults(),
                'password_confirmation' => 'required|same:password',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'status' => false]);
            } else {
                $user =  User::find($request->user_id);
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