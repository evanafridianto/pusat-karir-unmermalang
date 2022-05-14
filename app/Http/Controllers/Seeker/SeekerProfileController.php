<?php

namespace App\Http\Controllers\Seeker;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\User;
use App\Models\Seeker;
use App\Models\Address;
use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Province;
use App\Models\Applicant;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SeekerEducation;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class SeekerProfileController extends Controller
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
            // $vacancies = Vacancy::with('employers:id,company_name', 'categories:slug,name')->where('employer_id', $user->userable->id);
            $vacancyApply = Applicant::where('seeker_id', $user->userable->id);
            $data = [
                'title'  => 'Profil',
                'profile' => $user->userable,
                'account' => $user,
                'address' => $user->userable->address,
                'categories' => Category::where('type', 'Major')->orderBy('name', 'asc')->get(),
                'application_accept_count' => Applicant::where('seeker_id', $user->userable->id)->where('status', 'Accepted')->count(),
                'application_count' => Applicant::where('seeker_id', $user->userable->id)->count(),
                // 'vacancies' => $vacancies->latest()->filter($request)->paginate(5)->withQueryString(),
                'vacancy_applicants' =>  $vacancyApply->latest()->filter($request)->paginate(5)->withQueryString(),
            ];
            return view('seeker.profile', $data);
        } else {
            return abort(404);
        }
    }

    public function get(Request $request, $id)
    {
        if ($request->ajax()) {
            $employer = Seeker::where('id', $id)->with('address')->first();
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
                'address' => $user->userable->address,
                'majors' => Category::where('type', 'Major')->orderBy('name', 'asc')->get(),
                'provinces' => Province::get(),
                'edit' =>  $edit
            ];
            return view('seeker.edit', $data);
        } else {
            abort(404);
        }
    }

    public function store(Request $request, $step)
    {
        if ($step == 0) {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'logo' => 'image|mimes:jpeg,jpg,png,gif|max:5120|nullable',
                'date_of_birth' =>  'required|date_format:Y-m-d',
                'gender' =>  'required',
                'marital_status' => 'required',
                'telp' =>  'required|numeric',
                'website' => 'url|nullable',
                'description' => 'string|nullable|max:600',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'next' => false]);
            } else {
                return response()->json(['next' => true]);
            };
        } else if ($step == 1) {
            $validator = Validator::make($request->all(), [
                'province' => 'required',
                'city' => 'required',
                'street' => 'required',
                'zip_code' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'next' => false]);
            } else {
                return response()->json(['next' => true]);
            };
        } else if ($step == 2) {
            $validator = Validator::make($request->all(), [
                'last_education' => 'required',
                'major' => 'required',
                'institute_name' => 'required|string|max:255',
                'graduation_year' =>  'required',
                'gpa'   =>  'required',

            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'next' => false]);
            } else {
                $seeker =  Seeker::find($request->id);
                $seeker->first_name = $request->first_name;
                $seeker->last_name = $request->last_name;
                $seeker->telp = $request->telp;
                $seeker->date_of_birth = $request->date_of_birth;
                $seeker->gender = $request->gender;
                $seeker->marital_status = $request->marital_status;
                $seeker->website = $request->website;
                $seeker->description = $request->description;

                if ($request->hasFile('logo')) {
                    if (Storage::exists('public/logo/' . $request->old_logo) && !empty($request->old_logo)) {
                        Storage::delete('public/logo/' . $request->old_logo);
                    }
                    $name = Str::slug($request->first_name) . '_' . Carbon::now()->timestamp . '.' . $request->file('logo')->getClientOriginalExtension();
                    $seeker->logo = $name;
                    $request->file('logo')->storeAs('logo', $name, 'public');
                }

                $address = Address::find($request->address_id);
                $address->province_id = $request->province;
                $address->city_id = $request->city;
                $address->street = $request->street;
                $address->zip_code = $request->zip_code;

                $seeker_education = SeekerEducation::where('seeker_id', $request->id)->first();
                $seeker_education->last_education = $request->last_education;
                $seeker_education->major = $request->major;
                $seeker_education->institute_name = $request->institute_name;
                $seeker_education->graduation_year = $request->graduation_year;
                $seeker_education->gpa = $request->gpa;

                DB::beginTransaction();
                try {
                    $seeker->save();
                    $seeker->address()->save($address);
                    $seeker->seeker_education()->save($seeker_education);
                    DB::commit();
                    return response()->json(['status' => true]);
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
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
}