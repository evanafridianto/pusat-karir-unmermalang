<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Applicant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ApplicationNotify;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ApplicantController extends Controller
{
    //

    public function index(Request $request)
    {
        $data = [
            'title'  => 'Pelamar',
        ];

        if ($request->ajax()) {
            $data = Applicant::with('seeker', 'vacancy')->latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'status',
                    function ($row) {
                        if ($row->status == 'Pending') {
                            return '<span class="badge badge-warning text-white">' . $row->status . '</span>';
                        } elseif ($row->status == 'Accepted') {
                            return '<span class="badge badge-success text-white">' . $row->status . '</span>';
                        } elseif ($row->status == 'Rejected') {
                            return '<span class="badge badge-danger text-white">' . $row->status . '</span>';
                        }
                    }
                )
                ->editColumn(
                    'message',
                    function ($row) {

                        return Str::limit($row->message, 20);
                    }
                )
                ->editColumn(
                    'created_at',
                    function ($row) {
                        return $row->created_at->format('d M Y');
                    }
                )
                ->editColumn(
                    'company_name',
                    function ($row) {
                        return $row->vacancy->employers->company_name;
                    }
                )
                ->addColumn('action', function ($row) {

                    // if ($row->vacancy->employer_id != ) {
                    //     # code...
                    // }

                    if ($row->status == 'Accepted') {
                        $status =  '
                            <a href="javascript:void(0)" type="button" onclick="status(' . $row->id . ' , \'' . 'Rejected' . '\')" class="nav-link"><i class="fa fa-times"></i> Tolak</a>
                            <a href="javascript:void(0)" type="button" onclick="status(' . $row->id . ' , \'' . 'Pending' . '\')" class="nav-link"><i class="fa fa-pause"></i> Tunda</a>';
                    }
                    if ($row->status == 'Rejected') {
                        $status =  '
                                                       <a href="javascript:void(0)" type="button"  onclick="message(' . $row->id . ')" class="nav-link"><i class="fa fa-check"></i> Terima</a>
                            <a href="javascript:void(0)" type="button" onclick="status(' . $row->id . ' , \'' . 'Pending' . '\')" class="nav-link"><i class="fa fa-pause"></i> Tunda</a>';
                    }
                    if ($row->status == 'Pending') {

                        $status =  '
                            <a href="javascript:void(0)" type="button"  onclick="message(' . $row->id . ')" class="nav-link"><i class="fa fa-check"></i> Terima</a>
                            <a href="javascript:void(0)" type="button" onclick="status(' . $row->id . ' ,\'' . 'Rejected' . '\')" class="nav-link"><i class="fa fa-times"></i> Tolak</a>';
                    }

                    $btn = '<div class="dropdown">
                                <a href="" class="btn btn-secondary btn-icon rounded-circle mg-r-5" data-toggle="dropdown">
                                    <div class="d-flex align-items-center justify-content-center">
                                    <i class="fa fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu pd-10 wd-200">
                                    <nav class="nav nav-style-1 flex-column">' . $status .

                        '<a href="javascript:void(0)" type="button" onclick="destroy(' . $row->id . ')" class="nav-link"><i class="fa fa-trash"></i> Hapus</a>
                                    <a href="javascript:void(0)" type="button" onclick="detail(' . $row->id . ')" class="nav-link"><i class="fa fa-info-circle"></i> Detail</a>

                                    </nav>
                                </div>
                                </div>';
                    //  <a target="_blank" href="' . route('seeker.profile', $row->user->username) . '" class="nav-link"><i class="fa fa-user"></i> Profil</a>
                    // <a href="javascript:void(0)" type="button" onclick="detail(' . $row->id . ')" class="nav-link"><i class="fa fa-info-circle"></i> Detail</a>
                    return $btn;
                })
                ->rawColumns(['status', 'company_name', 'action'])
                ->make(true);
        }
        return view('admin.pages.applicant.index', $data);
    }



    public function getByid(Request $request, $id)
    {
        if ($request->ajax()) {
            $applicant = Applicant::where('id', $id)->with('seeker', 'vacancy', 'documents')->first();
            return response()->json($applicant);
        }
    }

    public function status(Request $request, $id, $status)

    {
        $validator = Validator::make($request->all(), [
            'message' => $status == 'Accepted' ? 'required|string|max:800' : '',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => false]);
        } else {

            $applicant = Applicant::findOrFail($id);
            $applicant->status = $status;
            $applicant->save();

            if ($status == 'Accepted') {
                $body = 'Selamat <b>' . $applicant->seeker->first_name . '</b>, anda diterima pada lowongan <b>' . $applicant->vacancy->job_title . '</b> di perusahaan <b>' . $applicant->vacancy->employers->company_name . '</b>.';
                $email = [
                    'body' => $request->message,
                ];
                Mail::to($applicant->seeker->user->email)->send(new ApplicationNotify($email));
            } elseif ($status == 'Rejected') {
                $body = 'Maaf <b>' . $applicant->seeker->first_name . '</b>, anda belum diterima pada lowongan <b>' . $applicant->vacancy->job_title . '</b> di perusahaan <b>' . $applicant->vacancy->employers->company_name . '</b> anda dapat mencoba dilain waktu.';
                $email = [
                    'body' => $body,
                ];
                Mail::to($applicant->seeker->user->email)->send(new ApplicationNotify($email));
            }
            return response()->json(['status' => true]);
        };
    }


    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
        return response()->json(['status' => true]);
    }
}