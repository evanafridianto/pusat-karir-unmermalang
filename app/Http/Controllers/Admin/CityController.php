<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{

    public function index(Request $request)
    {
        $data = [
            'title'  => 'Kota/Kabupaten',
            'provinces' => Province::orderBy('name', 'ASC')->get()
        ];
        if ($request->ajax()) {
            $data = City::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'province',
                    function ($row) {
                        return $row->province->name;
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
                                    <a href="javascript:void(0)" type="button" onclick="edit(' . $row->id . ')" class="nav-link"><i class="fa fa-pencil"></i> Hapus</a>
                                    </nav>
                                </div>
                                </div>';
                    return $btn;
                })
                ->rawColumns(['province', 'action'])
                ->make(true);
        }
        return view('admin.pages.city.index', $data);
    }

    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $province = City::findOrFail($id);
            return response()->json($province);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:150',
            'province' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => false]);
        } else {
            if (empty($request->id)) { //create
                $city = new City;
                $city->name =  $request->name;
                $city->province_id =  $request->province;
                $city->save();
            } else { //update
                $city = City::find($request->id);
                $city->name =  $request->name;
                $city->province_id =  $request->province;
                $city->save();
            }
            return response()->json(['status' => true]);
        };
    }

    public function byProv(Request $request, $id)
    {
        if ($request->ajax()) {
            $city = City::where('province_id', $id)->get();
            return response()->json($city);
        }
    }

    public function destroy($id)
    {
        $data = City::findOrFail($id);
        $data->delete();
        return response()->json(['status' => true]);
    }
}