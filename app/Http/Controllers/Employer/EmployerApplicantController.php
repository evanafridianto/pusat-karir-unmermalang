<?php

namespace App\Http\Controllers\Employer;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\User;
use App\Models\Applicant;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Mail\ApplicationNotify;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class EmployerApplicantController extends Controller
{
    public function __construct()
    {
        $pages = Page::where('carousel', '0')->where('status', 'active')->get();
        View::share(compact('pages'));
    }

    public function index(Request $request, $username)
    {
        // $employer = Applicant::where('id', 8)->with('seeker', 'vacancy', 'documents')->first();

        //         @foreach($model->getMedia('gallery') as $image)
        //  <img src="{{asset($image->getUrl('my-gallery-conversion'))}}">
        // @endforeach

        $user = User::where('username', $username)->first();
        $data = [
            'title'  => 'Pelamar',
            'dataku' =>  Applicant::where('id', 8)->with('seeker', 'vacancy', 'documents')->first(),

        ];
        if ($user && Auth::user()->username == $username) {
            if ($request->ajax()) {
                $data = Applicant::whereHas(
                    'vacancy',
                    fn ($query) =>
                    $query->where('employer_id', $user->userable->id)
                )->with('seeker', 'vacancy')->where('status', '!=', 'Rejected')->latest();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn(
                        'full_name',
                        function ($row) {
                            return $row->seeker->first_name . ' ' . $row->seeker->last_name;
                        }
                    )
                    ->editColumn(
                        'city',
                        function ($row) {
                            return $row->seeker->address->city->name;
                        }
                    )
                    ->editColumn(
                        'created_at',
                        function ($row) {
                            return $row->created_at->format('d M Y');
                        }
                    )
                    ->addColumn('action', function ($row) {

                        if ($row->status == 'Accepted') {
                            $status =  '<button
                            onclick="status(' . $row->id . ' , \'' . 'Rejected' . '\')"
                            type="button" title="Tolak"
                            class="ml-1 btn btn-xs btn-danger btn-icon">
                            <i class="fa-solid fa-times"></i></button>

                              <button onclick="status(' . $row->id . ' ,\'' . 'Pending' . '\')"
                            type="button" title="Tunda"
                            class="ml-1 btn btn-xs btn-primary btn-icon">
                          <i class="fa-solid fa-circle-pause"></i></button>';
                        } else {
                            $status =  '<button
                            onclick="message(' . $row->id . ')"
                            type="button" title="Terima"
                            class="ml-1 btn btn-xs btn-success btn-icon">
                            <i class="fa-solid fa-check"></i></button>

                            <button onclick="status(' . $row->id . ' ,\'' . 'Rejected' . '\')"
                            type="button" title="Tolak"
                            class="ml-1 btn btn-xs btn-danger btn-icon">
                            <i class="fa-solid fa-times"></i></button>';
                        }
                        //  <a href="#" class="btn btn-outline-primary btn-icon rounded-circle mg-r-5"><div><i class="fa fa-send"></i></div></a>
                        return  $status . '<button
                            onclick="detail(' . $row->id . ')" title="Detail"
                            type="button"
                            class="ml-1 btn btn-xs btn-custom btn-icon">
                            <i class="fa-solid fa-info-circle"></i></button>';
                    })
                    ->rawColumns(['city', 'full_name', 'action'])
                    ->make(true);
            }
            return view('employer.applicant', $data);
        } else {
            abort(404);
        }
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
}