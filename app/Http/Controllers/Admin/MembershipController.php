<?php

namespace App\Http\Controllers\Admin;

use App\Models\Membership;
use Illuminate\Http\Request;
use App\Mail\ApplicationNotify;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MembershipController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'  => 'Membership',
        ];

        // $data = Membership::with('user')->latest();
        // dd($data->get());
        if ($request->ajax()) {
            $data = Membership::with('user')->latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'image',
                    function ($row) {
                        return $row->image != "" && Storage::exists('public/membership/' . $row->image) ? '<a href="' . Storage::url('public/membership/' . $row->image) . '" target="_blank"><img class="img-thumbnail wd-150 ht-80 " src="' . Storage::url('public/membership/' . $row->image) . '"></a>' : 'Gambar tidak ditemukan';
                    }
                )
                ->editColumn(
                    'status',
                    function ($row) {
                        $badge = $row->status == 'Pending' ? '<span class="badge badge-warning text-white">' . $row->status . '</span>' : '<span class="badge badge-success text-white">' . $row->status . '</span>';
                        return $badge;
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
                                    <a target="_blank" href="' . route('seeker.profile', $row->user->username) . '" class="nav-link"><i class="fa fa-user"></i> Profil</a>

                                    </nav>
                                </div>
                                </div>';
                    // <a href="javascript:void(0)" type="button" onclick="detail(' . $row->id . ')" class="nav-link"><i class="fa fa-info-circle"></i> Detail</a>
                    return $btn;
                })
                ->rawColumns(['image', 'status', 'action'])
                ->make(true);
        }
        return view('admin.pages.membership.index', $data);
    }

    public function getByid(Request $request, $id)
    {
        if ($request->ajax()) {
            $membership = Membership::where('id', $id)->with('user')->first();
            return response()->json($membership);
        }
    }

    public function status($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->status = $membership->status == 'Pending' ? 'Verified' : 'Pending';
        $membership->save();

        if ($membership->status == 'Verified') {
            $body = 'Selamat, status <b>Membership Pusat Karir Unmer Malang</b> anda telah aktif hingga <b>' . $membership->expiry_date . '</b>.';
            $email = [
                'body' => $body
            ];
            Mail::to($membership->user->email)->send(new ApplicationNotify($email));
        }
        return response()->json(['status' => true]);
    }

    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        if (Storage::exists('public/membership/' . $membership->image)) {
            Storage::delete('public/membership/' . $membership->image);
        }
        $membership->delete();
        return response()->json(['status' => true]);
    }
}