<?php

namespace App\Http\Controllers\Seeker;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\User;
use App\Models\Vacancy;
use App\Mail\Application;
use App\Models\Applicant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ApplicationNotify;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SeekerApplicantController extends Controller
{

    private $mediaCollection  = 'documents';
    public function index($username, $slug)
    {
        $user = User::where('username', $username)->first();
        if ($user && Auth::user()->username == $username) {
            $vacancy = Vacancy::where('slug', $slug)->first();
            $checkApplicant = Applicant::where('seeker_id', $user->userable->id)->where('vacancy_id', $vacancy->id)->first();
            if ($checkApplicant) {
                return abort(403, 'Anda telah melamar dilowongan ini! ');
            } else {
                $data = [
                    'title'  => 'Lamaran',
                    'vacancy' => $vacancy,
                    'profile' => $user->userable,
                    'mediaCollection ' => $this->mediaCollection,
                ];
                return view('seeker.application', $data);
            }
        } else {
            return abort(404);
        }
    }

    public function application_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'documents' => 'required|max:2048',
            'message' => 'max:500|nullable',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => false]);
        } else {

            $applicant = new Applicant();
            $applicant->seeker_id = $request->seeker_id;
            $applicant->vacancy_id =  $request->vacancy_id;
            $applicant->message =  $request->message;

            foreach ($request->input('documents', []) as $file) {
                // $applicant->addMedia(storage_path('documents/' . $file))->toMediaCollection($this->mediaCollection);
                $applicant->addMedia(storage_path('documents/' . $file))->toMediaCollection('documents');
            }
            $applicant->save();

            $body = 'Halo <b>' . $request->company_name . '</b>, anda memiliki pelamar baru pada lowongan <b>' . $request->job_title . '</b> <a href="' . route('employer.applicant', $request->company_username) . '"> cek sekarang!</a>';
            $email = [
                'body' => $body,
            ];
            Mail::to($request->company_email)->send(new ApplicationNotify($email));

            return response()->json(['status' => true]);
        }
    }

    public function documents_store(Request $request)
    {

        $file = $request->file('file');
        $name = 'document_' . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();
        $request->thumbnail = $name;
        $file->move(storage_path('documents'), $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function documents_destroy($name)
    {
        if (File::exists(storage_path('documents/' . $name))) {
            File::delete(storage_path('documents/' . $name));
            return response()->json(['status' => true]);
        }
    }

    public function logo_destroy($name)
    {
        if (Storage::exists('public/logo/' . $name)) {
            Storage::delete('public/logo/' . $name);
        }
        return response()->json(['status' => true]);
    }

    public function application_destroy($id)
    {
        // if (Storage::exists('public/logo/' . $name)) {
        //     Storage::delete('public/logo/' . $name);
        // }
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
        return response()->json(['status' => true]);
    }
}