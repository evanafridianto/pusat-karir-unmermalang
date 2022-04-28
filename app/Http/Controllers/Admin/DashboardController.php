<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Seeker;
use App\Models\Article;
use App\Models\Vacancy;
use App\Models\Employer;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()

    {
        $data = [
            'title'  => 'Dashboard',
            'articles' => Article::latest()->limit(5),
            'vacancy_count' => Vacancy::count(),
            'employer_count' => Employer::count(),
            'seeker_count' => Seeker::count(),
            'article_count' => Article::count(),

            'seeker_membership_count' => Membership::whereHas(
                'user',
                fn ($query) =>
                $query->where('userable_type', 'App\Models\Seeker')
            )->count(),
            'employer_membership_count' => Membership::whereHas(
                'user',
                fn ($query) =>
                $query->where('userable_type', 'App\Models\Employer')
            )->count(),

            'vacancy_today' => Vacancy::whereDate('created_at', Carbon::today())->count(),
            'vacancy_yesterday' => Vacancy::whereDate('created_at', date("Y-m-d", strtotime("-1 days")))->count(),
            'vacancy_lastmonth' => Vacancy::whereMonth('created_at', Carbon::now()->subMonth()->month)->count(),
            'vacancy_lastweek' => Vacancy::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->count(),

            'article_today' => Article::whereDate('created_at', Carbon::today())->count(),
            'article_yesterday' => Article::whereDate('created_at', date("Y-m-d", strtotime("-1 days")))->count(),
            'article_lastmonth' => Article::whereMonth('created_at', Carbon::now()->subMonth()->month)->count(),
            'article_lastweek' => Article::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->count(),

            // 'seeker_membership' => Membership::where('')
        ];
        return view('admin.pages.dashboard', $data);
        // print_r('ahaha');


    }

    public function create()
    {
        //
    }

    public function applicantOfmajor()
    {
        $data = DB::table('applicants')
            ->select('name', DB::raw('count(applicants.id) as total_applicant'))
            ->leftJoin('seekers', 'seekers.id', '=', 'applicants.seeker_id')
            ->leftJoin('seeker_education', 'seekers.id', '=', 'seeker_education.seeker_id')
            ->leftJoin('categories', 'categories.id', '=', 'seeker_education.major')
            ->groupBy('name')
            ->get();

        return response()->json($data);
    }

    public function applicantOfcity(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('applicants')
                ->select('cities.name', DB::raw('count(applicants.id) as total'))
                ->leftJoin('seekers', 'seekers.id', '=', 'applicants.seeker_id')
                ->leftJoin('addresses', 'addresses.addressable_id', '=', 'seekers.id')
                ->where('addresses.addressable_type', 'App\Models\Seeker')
                ->leftJoin('cities', 'cities.id', '=', 'addresses.city_id')
                ->groupBy('cities.name')
                ->orderBy('total', 'desc');
            // ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function employerOfcity(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('employers')
                ->select('cities.name', DB::raw('count(employers.id) as total'))
                ->leftJoin('addresses', 'addresses.addressable_id', '=', 'employers.id')
                ->where('addresses.addressable_type', 'App\Models\Employer')
                ->leftJoin('cities', 'cities.id', '=', 'addresses.city_id')
                ->groupBy('cities.name')
                ->orderBy('total', 'desc');
            // ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}