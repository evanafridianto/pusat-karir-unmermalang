<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Page;
use App\Models\User;
use App\Models\Article;
use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Employer;
use Laratrust\Laratrust;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{

    public function __construct()
    {
        $pages = Page::get();
        View::share(compact('pages'));
    }

    public function index()
    {
        $data = [
            'title'  => 'Beranda',
            'job_vacancies' =>  Vacancy::latest()->where('job_type', '!=', 'Internship')->where('expiry_date', '>', Carbon::now()->setTimezone('Asia/Jakarta'))->limit(6)->get(),
            'job_internships' =>  Vacancy::latest()->orWhere('job_type', 'Internship')->where('expiry_date', '>', Carbon::now()->setTimezone('Asia/Jakarta'))->limit(6)->get(),
            'articles' => Article::whereHas('category', function (Builder $query) {
                $query->where('type', 'News');
            })->get(),
            'categories' => Category::where('type', 'Major')->orderBy('name', 'asc')->get(),
        ];
        return view('front.pages.home', $data);
    }

    public function vacancy(Request $request)
    {
        $data = [
            'title'  => 'Lowongan Karir',
            'categories' => Category::where('type', 'Major')->orderBy('name', 'asc')->get(),
            'vacancies' =>  Vacancy::latest()->where('expiry_date', '>', Carbon::now()->setTimezone('Asia/Jakarta'))->filter($request)->paginate(12)->withQueryString(),
        ];
        return view('front.pages.vacancy', $data);
    }

    public function vacancy_description($slug)
    {
        $vacancy = Vacancy::where('slug', $slug)->first();
        if ($vacancy) {
            $data = [
                'title'  => 'Deskripsi Lowongan',
                'vacancy' => $vacancy,
                'vacancy_employers' => Vacancy::where('employer_id', $vacancy->employers->id)->where('expiry_date', '>', Carbon::now()->setTimezone('Asia/Jakarta'))->limit(8)->get(),
            ];
            return view('front.pages.vacancy-description', $data);
        } else {
            abort(404);
        }
    }

    public function article()
    {
        $data = [
            'title'  => 'Berita & Event',
            'articles' =>  Article::latest()->filter(request(['search', 'category', 'tags']))->paginate(6)->withQueryString(),
            'tags' => Tag::limit(5)->get(),
            'categories' => Category::where('type', 'News')->orWhere('type', 'Events')->orderBy('name', 'asc')->get(),
        ];
        return view('front.pages.article', $data);
    }

    public function article_read($slug)
    {

        $article = Article::where('slug', $slug)->with('tags:slug,name')->first();

        $data = [
            'title'  =>  $slug,
            'article' => $article,
            'article_relateds' =>   Article::whereHas('category', function (Builder $query) use ($article) {
                $query->where('slug', $article->category->slug)->limit(8);
            })->get(),
            // 'job_vacancies' =>  Vacancy::latest()->where('job_type', '!=', 'Internship')->orWhere('expiry_date', '>', Carbon::now()->setTimezone('Asia/Jakarta'))->limit(6)->get(),
        ];
        if ($article) {
            return view('front.pages.article-read', $data);
        } else {
            abort(404);
        }
    }


    public function pay_confirmation($username)
    {
        if (Auth::user()->username == $username) {
            $membership = Membership::where('user_id', Auth::user()->id)->first();
            $data = [
                'title'  => 'Konfirmasi Pembayaran',
            ];
            if (!$membership || $membership->expiry_date < Carbon::now()->setTimezone('Asia/Jakarta')) {
                return view('front.pages.pay-confirmation', $data);
            } else {
                return abort(403, 'Maaf, anda telah mendaftar sebagai membership!');
            }
        } else {
            abort(404);
        }
    }

    public function store_membership(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048|required',
            'total_pay' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => false]);
        } else {

            $membershipId = Membership::where('user_id', $request->user_id)->first();
            if (!$membershipId) { //create
                if ($request->hasFile('image')) {
                    $name = 'confirmation_' . Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
                    $request->image = $name;
                    $request->file('image')->storeAs('membership', $name, 'public');
                }

                $membership = new Membership;
                $membership->user_id = $request->user_id;
                $membership->image =  $request->image;
                $membership->expiry_date = Carbon::now()->addMonth();
                $membership->total_pay =  $request->total_pay;
                $membership->save();
            } else {

                if ($request->hasFile('image')) {
                    if (Storage::exists('public/membership/' . $membershipId->image)) {
                        Storage::delete('public/membership/' . $membershipId->image);
                    }
                    $name = 'confirmation_' . Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
                    $request->image = $name;
                    $request->file('image')->storeAs('membership', $name, 'public');
                }

                $membership =  Membership::find($membershipId->id);
                $membership->user_id = $request->user_id;
                $membership->image =  $request->image;
                $membership->expiry_date = Carbon::now()->addMonth();
                $membership->total_pay =  $request->total_pay;

                $membership->save();
            }

            return response()->json(['status' => true]);
        };
    }
}