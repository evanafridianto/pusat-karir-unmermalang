<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seeker;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class SeekerController extends Controller

{
    public function index(Request $request)
    {
        $data = [
            'title'  => 'Perusahaan',
        ];
        // $datak = Employer::latest();
        // dd($datak);
        if ($request->ajax()) {
            $data = Seeker::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'name',
                    function ($row) {
                        return $row->first_name . ' ' . $row->last_name;
                    }
                )
                ->editColumn(
                    'last_educ',
                    function ($row) {
                        return $row->seeker_education->last_education;
                    }
                )
                ->editColumn(
                    'major',
                    function ($row) {
                        // return $row->category->name;
                        return $row->seeker_education->category->name;
                    }
                )
                ->editColumn(
                    'institute_name',
                    function ($row) {
                        return $row->seeker_education->institute_name;
                    }
                )
                ->editColumn(
                    'city',
                    function ($row) {
                        return $row->address->city->name;
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
                                    <a href="javascript:void(0)" type="button" onclick="detail(' . $row->id . ')" class="nav-link"><i class="fa fa-info-circle"></i> Detail</a>

                                    <a target="_blank" href="' . route('seeker.profile', $row->user->username) . '" class="nav-link"><i class="fa fa-user"></i> Profil</a>
                                    </nav>
                                </div>
                                </div>';
                    return $btn;
                })
                ->rawColumns(['name', 'last_educ', 'major', 'institute_name', 'city', 'action'])
                ->make(true);
        }
        return view('admin.pages.seeker.index', $data);
    }

    public function getByid(Request $request, $id)
    {
        if ($request->ajax()) {
            $seeker = Seeker::where('id', $id)->with('address', 'seeker_education')->first();
            return response()->json($seeker);
        }
    }

    public function destroy($id)
    {
        $seeker = Seeker::findOrFail($id);
        if (Storage::exists('public/logo/' . $seeker->logo)) {
            Storage::delete('public/logo/' . $seeker->logo);
        }
        $seeker->user()->delete();
        $seeker->address()->delete();
        $seeker->delete();
        return response()->json(['status' => true]);
    }
}