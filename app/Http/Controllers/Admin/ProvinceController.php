<?php

namespace App\Http\Controllers\Admin;

use App\Models\Province;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProvinceController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'  => 'Provinsi',
        ];
        if ($request->ajax()) {
            $data = Province::latest();
            return DataTables::of($data)
                ->addIndexColumn()
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
                                    <a href="javascript:void(0)" type="button" onclick="edit(' . $row->id . ')" class="nav-link"><i class="fa fa-pencil"></i> Hapus</a>
                                    </nav>
                                </div>
                                </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.province.index', $data);
    }


    public function show(Request $request)
    {
        if ($request->ajax()) {
            $provinces = Province::orderBy('name')->get();
            return response()->json($provinces);
        }
    }

    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $province = Province::findOrFail($id);
            return response()->json($province);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:150',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => false]);
        } else {
            if (empty($request->id)) { //create
                $province = new Province();
                $province->name =  $request->name;
                $province->save();
            } else { //update
                $province = Province::find($request->id);
                $province->name =  $request->name;
                $province->save();
            }
            return response()->json(['status' => true]);
        };
    }

    public function destroy($id)
    {
        $data = Province::findOrFail($id);
        $data->delete();
        return response()->json(['status' => true]);
    }
}