<?php

namespace App\Http\Controllers\Employer;

use App\Models\Page;
use App\Models\Address;
use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class EmployerVacancyController extends Controller
{
    public function index($id)
    {
        $data = Vacancy::with('employers:id,company_name', 'categories:slug,name')->where('employers.id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return ($data);
    }


    public function create()
    {

        if (Auth::user()->userable->status == 'Verified') {
            $data = [
                'title'  => 'Posting Lowongan',
                'majors' => Category::where('type', 'Major')->get(),
            ];
            return view('employer.vacancy-form', $data);
        } else {
            abort(403, 'Maaf, perusahaan sedang diverifikasi!');
        }
    }

    public function edit(Request $request, $slug)
    {
        $vacancy = Vacancy::where('slug', $slug)->with('employers:id,company_name', 'categories', 'address')->first();
        if ($vacancy) {
            $data = [
                'title'  => 'Edit Lowongan',
                'majors' => Category::where('type', 'Major')->get(),
            ];
            if ($request->ajax()) {
                return response()->json($vacancy);
            }
            return view('employer.vacancy-form', $data);
        } else {
            abort(404);
        }
    }

    public function store(Request $request, $step)
    {
        if ($step == 0) {
            $validator = Validator::make($request->all(), [
                'job_title' => 'required|max:100',
                'slug' =>  empty($request->id) ? 'required|max:255|unique:vacancies,slug' : 'required|max:255|unique:vacancies,slug,' . $request->id,
                'description' => 'required',
                'category' => 'required',
                'job_type' => 'required',
                'expiry_date' => 'required|after:' . Carbon::now()->setTimezone('Asia/Jakarta'),
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'next' => false]);
            } else {
                return response()->json(['next' => true]);
            }
        } else if ($step == 1) {
            $employer = Employer::findOrFail($request->company);
            $validator = Validator::make($request->all(), [
                'province' => 'required',
                'city' => 'required',
                'street' => 'required',
                'zip_code' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'status' => false]);
            } else {
                if (empty($request->id)) { //create
                    $vacancy = new Vacancy;
                    $vacancy->employer_id = $request->company;
                    $vacancy->job_title = $request->job_title;
                    $vacancy->slug = SlugService::createSlug(Vacancy::class, 'slug', $request->job_title . '-at-' . $employer->company_name);
                    $vacancy->description = $request->description;
                    $vacancy->job_type = $request->job_type;
                    $vacancy->expiry_date = $request->expiry_date;

                    $address = new Address();
                    $address->province_id = $request->province;
                    $address->city_id = $request->city;
                    $address->street = $request->street;
                    $address->zip_code = $request->zip_code;

                    DB::beginTransaction();
                    try {
                        $vacancy->save();
                        $vacancy->address()->save($address);
                        $vacancy->categories()->attach($request->category);
                        DB::commit();
                        return response()->json(['status' => true]);
                    } catch (\Throwable $th) {
                        DB::rollBack();
                    }
                } else { //update
                    $vacancy = Vacancy::find($request->id);
                    $vacancy->employer_id = $request->company;
                    $vacancy->job_title = $request->job_title;
                    $vacancy->slug = $request->slug;
                    // $vacancy->slug = SlugService::createSlug(Vacancy::class, 'slug', $request->job_title . '-at-' . $employer->company_name);
                    $vacancy->description = $request->description;
                    $vacancy->job_type = $request->job_type;
                    $vacancy->expiry_date = $request->expiry_date;

                    $address = Address::find($request->address_id);
                    $address->province_id = $request->province;
                    $address->city_id = $request->city;
                    $address->street = $request->street;
                    $address->zip_code = $request->zip_code;

                    DB::beginTransaction();
                    try {
                        $vacancy->save();
                        $vacancy->address()->save($address);
                        $vacancy->categories()->sync($request->category);
                        DB::commit();
                        return response()->json(['status' => true]);
                    } catch (\Throwable $th) {
                        DB::rollBack();
                    }
                }
            };
        }
    }

    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->delete();
        // $vacancy->categories()->detach($vacancy->category_ids);
        return response()->json(['status' => true]);
    }
}