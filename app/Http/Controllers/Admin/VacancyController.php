<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Address;
use App\Models\Vacancy;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use PhpParser\Node\Stmt\TryCatch;

class VacancyController extends Controller
{

    public function index(Request $request)
    {
        $data = [
            'title'  => 'Lowongan Karir',
        ];
        if ($request->ajax()) {
            // $data = Vacancy::with('employers:id,company_name', 'categories:slug,name')
            $data = Vacancy::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'company_name',
                    function ($row) {
                        return $row->employers->company_name;
                    }
                )
                ->editColumn(
                    'categories',
                    function ($row) {
                        return $row->categories->pluck('name')->toArray();
                    }
                )
                ->editColumn(
                    'city',
                    function ($row) {
                        return $row->address->city->name;
                    }
                )
                ->editColumn(
                    'expiry_date',
                    function ($row) {
                        return $row->expiry_date <
                            Carbon::now()->setTimezone('Asia/Jakarta') ? '<span class="badge badge-danger">' . $row->expiry_date . '</span>' : '<span class="badge badge-primary">' . $row->expiry_date . '</span>';
                    }
                )
                ->addColumn('action', function ($row) {
                    $btn = '<div class="dropdown">
                                <a href="" class="btn btn-secondary btn-icon rounded-circle mg-r-5" data-toggle="dropdown">
                                    <div class="d-flex align-items-center justify-content-center">
                                    <i class="fa fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu pd-10 wd-200">
                                    <nav class="nav nav-style-1 flex-column">
                                    <a href="javascript:void(0)" type="button" onclick="destroy(' . $row->id . ')" class="nav-link"><i class="fa fa-trash"></i> Hapus</a>
                                    <a href="' . route("admin.vacancy.edit", $row->slug) . '" class="nav-link"><i class="fa fa-pencil"></i> Edit</a>
                                    <a target="_blank" href="' . route('vacancy.description', $row->slug) . '" class="nav-link"><i class="fa fa-eye"></i> Lihat</a>
                                    </nav>
                                </div>
                                </div>';
                    return $btn;
                })
                ->rawColumns(['company_name', 'city', 'categories', 'expiry_date', 'action'])
                ->make(true);
        }
        return view('admin.pages.vacancy.index', $data);
    }

    public function create()
    {
        $data = [
            'title'  => 'Tambah Lowongan',
            'employer' => Employer::orderBy('company_name', 'ASC')->get(),
        ];
        return view('admin.pages.vacancy.form', $data);
    }

    public function edit(Request $request, $slug)
    {
        $vacancy = Vacancy::where('slug', $slug)->with('employers:id,company_name', 'categories', 'address')->first();
        if ($vacancy) {
            $data = [
                'title'  => 'Edit Lowongan',
                'employer' => Employer::orderBy('company_name', 'ASC')->get(),
            ];
            if ($request->ajax()) {
                return response()->json($vacancy);
            }
            return view('admin.pages.vacancy.form', $data);
        } else {
            abort(404);
        }
    }

    public function store(Request $request, $step)
    {
        if ($step == 0) {
            $validator = Validator::make($request->all(), [
                'company' => 'required',
                'job_title' => 'required|max:100',
                'slug' => !empty($request->id) ? 'required|string|max:255|alpha_dash|unique:vacancies,slug,' . $request->id : '',
                'description' => 'required',
                'category_ids' => 'required',
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
                        $vacancy->categories()->attach($request->category_ids);
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
                        $vacancy->categories()->sync($request->category_ids);
                        DB::commit();
                        return response()->json(['status' => true]);
                    } catch (\Throwable $th) {
                        DB::rollBack();
                    }
                }
                return response()->json(['status' => true]);
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