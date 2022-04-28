<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Address;
use App\Models\Employer;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ApplicationNotify;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class EmployerController extends Controller
{

    public function index(Request $request)
    {
        $data = [
            'title'  => 'Perusahaan',
        ];
        // $datak = Employer::latest()->get();
        // foreach ($datak as $key) {
        //     # code...
        //     dd($key->user->username);
        // }
        if ($request->ajax()) {
            $data = Employer::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'category',
                    function ($row) {
                        // return $row->categoryb;
                        return $row->category->name;
                    }
                )
                ->editColumn(
                    'status',
                    function ($row) {
                        $badge = $row->status == 'Pending' ? '<span class="badge badge-warning text-white">' . $row->status . '</span>' : '<span class="badge badge-success text-white">' . $row->status . '</span>';
                        return $badge;
                    }
                )
                ->editColumn(
                    'city',
                    function ($row) {
                        return $row->address->city->name;
                    }
                )
                ->addColumn('action', function ($row) {
                    if ($row->status == 'Pending') {
                        $status =  '<a href="javascript:void(0)" type="button"  onclick="status(' . $row->id . ' )" class="nav-link"><i class= "fa fa-check"></i> Verified</a>';
                    } else {
                        $status =  '<a href="javascript:void(0)" type="button"  onclick="status(' . $row->id . ' )" class="nav-link"><i class= "fa fa-times"></i> Unverified</a>';
                    }
                    //  <a href="#" class="btn btn-outline-primary btn-icon rounded-circle mg-r-5"><div><i class="fa fa-send"></i></div></a>
                    $btn = '<div class="dropdown">
                                <a href="" class="btn btn-secondary btn-icon rounded-circle mg-r-5" data-toggle="dropdown">
                                    <div class="d-flex align-items-center justify-content-center">
                                    <i class="fa fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu pd-10 wd-200">
                                    <nav class="nav nav-style-1 flex-column">' . $status . '
                                    <a href="javascript:void(0)" type="button" onclick="destroy(' . $row->id . ')" class="nav-link"><i class="fa fa-trash"></i> Hapus</a>
                                    <a href="javascript:void(0)" type="button" onclick="detail(' . $row->id . ')" class="nav-link"><i class="fa fa-info-circle"></i> Detail</a>

                                    <a target="_blank" href="' . route('employer.profile', $row->user->username) . '" class="nav-link"><i class="fa fa-user"></i> Profil</a>
                                    </nav>
                                </div>
                                </div>';
                    return $btn;
                })
                ->rawColumns(['category', 'status', 'city', 'action'])
                ->make(true);
        }
        return view('admin.pages.employer.index', $data);
    }


    public function getByid(Request $request, $id)
    {
        if ($request->ajax()) {
            $employer = Employer::where('id', $id)->with('address')->first();
            return response()->json($employer);
        }
    }

    public function status($id)
    {
        $employer = Employer::findOrFail($id);
        $employer->status = $employer->status == 'Pending' ? 'Verified' : 'Pending';
        $employer->save();

        if ($employer->status == 'Verified') {
            $body = 'Selamat, perusahaan <b>' . $employer->company_name . '</b>, telah diverfikasi!, sekarang anda dapat memposting lowongan di web <b>Pusat Karir Unmer Malang</b>.';
            $email = [
                'body' => $body
            ];
            Mail::to($employer->user->email)->send(new ApplicationNotify($email));
        }
        return response()->json(['status' => true]);
    }

    public function destroy($id)
    {
        $employer = Employer::findOrFail($id);
        if (Storage::exists('public/logo/' . $employer->logo)) {
            Storage::delete('public/logo/' . $employer->logo);
        }
        $employer->user()->delete();
        $employer->address()->delete();
        $employer->delete();
        return response()->json(['status' => true]);
    }
}