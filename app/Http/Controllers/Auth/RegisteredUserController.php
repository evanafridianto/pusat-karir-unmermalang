<?php

namespace App\Http\Controllers\Auth;

use App\Models\Page;
use App\Models\Role;
use App\Models\User;
use App\Models\Seeker;
use App\Models\Address;
use App\Models\Category;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\SeekerEducation;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create($role)
    {

        if ($role == 'seeker' || $role == 'employer') {
            $data = [
                'title' => 'Register',
                'business_field' => Category::where('type', 'Business Field')->orderBy('name', 'asc')->get(),
                'major' => Category::where('type', 'Major')->orderBy('name', 'asc')->get(),
                'role' =>  $role,
            ];
            return view('auth.register', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, $step)
    {
        if ($request->role == 'employer') {
            if ($step == 0) {
                $validator = Validator::make($request->all(), [
                    'company_name' => 'required',
                    'tin' =>  'required|numeric|digits:15',
                    // 'tin' =>  'required|numeric',
                    'since' =>  'required',
                    'business_scale' => 'required',
                    'business_field' => 'required',
                    'number_of_employee' => 'required',
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
                    return response()->json(['error' => $validator->errors(), 'next' => false]);
                } else {
                    return response()->json(['next' => true]);
                };
            } else if ($step == 2) {
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email:dns|unique:users,email',
                    'username' => 'required|min:6|max:255|alpha_dash|unique:users,username',
                    'password' => 'required|min:6|max:255', Rules\Password::defaults(),
                    'password_confirmation' => 'required|same:password',

                    'term' => 'required',
                ], ['term.required' => 'Please accept our Terms and Conditions.']);

                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors(), 'status' => false]);
                } else {

                    $employer = new Employer();
                    $employer->company_name = $request->company_name;
                    $employer->since = $request->since;
                    $employer->telp = $request->telp;
                    $employer->tin = $request->tin;
                    $employer->business_scale = $request->business_scale;
                    $employer->category_id = $request->business_field;
                    $employer->number_of_employee = $request->number_of_employee;

                    $address = new Address();
                    $address->province_id = $request->province;
                    $address->city_id = $request->city;
                    $address->street = $request->street;
                    $address->zip_code = $request->zip_code;

                    $user = new User;
                    $user->email  = $request->email;
                    $user->username  = $request->username;
                    $user->password = Hash::make($request->password);

                    DB::beginTransaction();
                    try {
                        $employer->save();
                        $employer->address()->save($address);
                        $employer->user()->save($user);
                        $user->attachRole($request->role);
                        event(new Registered($user));
                        DB::commit();
                        return response()->json(['status' => true]);
                    } catch (\Throwable $th) {
                        DB::rollBack();
                    }
                };
            }
        } else if ($request->role == 'seeker') {
            if ($step == 0) {
                $validator = Validator::make($request->all(), [
                    'first_name' => 'required|string|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
                    'last_name' => 'required|string|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
                    'date_of_birth' =>  'required|date_format:Y-m-d',
                    'gender' =>  'required',
                    'marital_status' => 'required',
                    'telp' =>  'required|numeric',
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
                    'institute_name' => 'required|string|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
                    'graduation_year' =>  'required',
                    // 'gpa' => 'required|regex:^[0-9]{1,3}(,[0-9]{3})*\,[0-9]+$',
                    'gpa'   =>  'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors(), 'next' => false]);
                } else {
                    return response()->json(['next' => true]);
                };
            } else if ($step == 3) {
                $validator = Validator::make($request->all(), [
                    // 'email' => 'required|email|unique:users,email',
                    'email' => 'required|email:rfc,dns|unique:users,email',
                    'username' => 'required|min:6|max:255|alpha_dash|unique:users,username',
                    'password' => 'required|min:6|max:255', Rules\Password::defaults(),
                    'password_confirmation' => 'required|same:password',

                    'term' => 'required',
                ], ['term.required' => 'Please accept our Terms and Conditions.']);
                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors(), 'status' => false]);
                } else {

                    $seeker = new Seeker();
                    $seeker->first_name = $request->first_name;
                    $seeker->last_name = $request->last_name;
                    $seeker->telp = $request->telp;
                    $seeker->date_of_birth = $request->date_of_birth;
                    $seeker->gender = $request->gender;
                    $seeker->marital_status = $request->marital_status;

                    $address = new Address();
                    $address->province_id = $request->province;
                    $address->city_id = $request->city;
                    $address->street = $request->street;
                    $address->zip_code = $request->zip_code;

                    $seeker_education = new SeekerEducation();
                    $seeker_education->last_education = $request->last_education;
                    $seeker_education->major = $request->major;
                    $seeker_education->institute_name = $request->institute_name;
                    $seeker_education->graduation_year = $request->graduation_year;
                    $seeker_education->gpa = $request->gpa;

                    $user = new User;
                    $user->email  = $request->email;
                    $user->username  = $request->username;
                    $user->password = Hash::make($request->password);

                    DB::beginTransaction();
                    try {
                        $seeker->save();
                        $seeker->address()->save($address);
                        $seeker->seeker_education()->save($seeker_education);
                        $seeker->user()->save($user);
                        $user->attachRole($request->role);
                        event(new Registered($user));
                        DB::commit();
                        return response()->json(['status' => true]);
                    } catch (\Throwable $th) {
                        DB::rollBack();
                    }
                };
            }
        }
        // return redirect(RouteServiceProvider::HOME);
    }
}