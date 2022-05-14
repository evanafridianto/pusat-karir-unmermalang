<?php

use App\Models\Tag;
use App\Models\Page;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SeekerController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmployerController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Seeker\SeekerProfileController;
use App\Http\Controllers\Seeker\SeekerApplicantController;
use App\Http\Controllers\Seeker\SeekerDashboardController;
use App\Http\Controllers\Employer\EmployerProfileController;
use App\Http\Controllers\Employer\EmployerVacancyController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Employer\EmployerApplicantController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('vacancy', [FrontController::class, 'vacancy'])->name('vacancy');
Route::get('vacancy/description/{slug}', [FrontController::class, 'vacancy_description'])->name('vacancy.description');
Route::get('article', [FrontController::class, 'article'])->name('article');
Route::get('{username}/membership/confirmation', [FrontController::class, 'pay_confirmation'])->name('pay.confirmation')->middleware('auth');
Route::post('membership/store', [FrontController::class, 'store_membership'])->name('store.membership')->middleware('auth');


Route::get('article/read/{slug}', [FrontController::class, 'article_read'])->name('article.read');
Route::get('province/show', [ProvinceController::class, 'show'])->name('province.show');
Route::get('city/byprov/{id}', [CityController::class, 'byProv'])->name('city.by.prov');


Route::group(['prefix' => 'seeker'], function () {
    Route::get('seeker/{username}/profile', [SeekerProfileController::class, 'index'])->name('seeker.profile');
});
Route::group(['prefix' => 'employer'], function () {
    Route::get('{username}/profile', [EmployerProfileController::class, 'index'])->name('employer.profile');
});


// pages front
$pages = Page::where('status', 'active')->get();
foreach ($pages as $key => $page) {
    Route::get($page->slug, function () use ($page) {
        $data = [
            'title'  =>  $page->title,
            'page' =>  $page,
            'pages' => Page::where('carousel', '0')->where('status', 'active')->get(),
            'puskar' => User::whereRoleIs('admin')->first()
        ];
        return view('front.pages.page', $data);
    })->name($page->slug);
}

// ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin', 'is_admin']], function () {

    // profile
    Route::get('profile/edit', [ProfileController::class, 'index'])->name('admin.profile.edit');
    Route::delete('profile/destroy/{name}', [ProfileController::class, 'logo_destroy'])->name('admin.logo.destroy');
    // account
    Route::get('account/{username}', [ProfileController::class, 'account'])->name('admin.account');
    Route::post('profile/store/{step}', [ProfileController::class, 'store'])->name('admin.profile.store');

    // dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('dashboard/applicantofcity', [DashboardController::class, 'applicantOfcity'])->name('applicant.of.city');
    Route::get('dashboard/applicantofmajor', [DashboardController::class, 'applicantOfmajor'])->name('applicant.of.major');
    Route::get('dashboard/employerofcity', [DashboardController::class, 'employerOfcity'])->name('employer.of.city');
    // article
    Route::get('article', [ArticleController::class, 'index'])->name('admin.article');
    Route::get('article/create', [ArticleController::class, 'create'])->name('admin.article.create');
    Route::get('article/edit/{slug}', [ArticleController::class, 'edit'])->name('admin.article.edit');
    Route::post('article/store', [ArticleController::class, 'store'])->name('admin.article.store');
    Route::delete('article/destroy/{id}', [ArticleController::class, 'destroy'])->name('admin.article.destroy');

    // vacancy
    Route::get('vacancy', [VacancyController::class, 'index'])->name('admin.vacancy');
    Route::get('vacancy/create', [VacancyController::class, 'create'])->name('admin.vacancy.create');
    Route::get('vacancy/edit/{slug}', [VacancyController::class, 'edit'])->name('admin.vacancy.edit');
    Route::post('vacancy/store/{step}', [VacancyController::class, 'store'])->name('admin.vacancy.store');
    Route::delete('vacancy/destroy/{slug}', [VacancyController::class, 'destroy'])->name('admin.vacancy.destroy');

    // category
    Route::get('category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::delete('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::get('category/select/{parent}', [categoryController::class, 'select_category'])->name('category.select');

    // employer
    Route::get('employer', [EmployerController::class, 'index'])->name('admin.employer');
    Route::get('employer/get/{id}', [EmployerController::class, 'getByid'])->name('admin.employer.get');
    Route::delete('employer/destroy/{id}', [EmployerController::class, 'destroy'])->name('admin.employer.destroy');
    Route::post('employer/status/{id}', [EmployerController::class, 'status'])->name('admin.employer.status');

    // seeker
    Route::get('seeker', [SeekerController::class, 'index'])->name('admin.seeker');
    Route::get('seeker/get/{id}', [SeekerController::class, 'getByid'])->name('admin.seeker.get');
    Route::delete('seeker/destroy/{id}', [SeekerController::class, 'destroy'])->name('admin.seeker.destroy');

    // applicant
    Route::get('applicant', [ApplicantController::class, 'index'])->name('admin.applicant');
    Route::get('applicant/get/{id}', [ApplicantController::class, 'getByid'])->name('admin.applicant.get');
    Route::post('applicant/status/{id}/{status}', [ApplicantController::class, 'status'])->name('admin.applicant.status');
    Route::delete('applicant/destroy/{id}', [ApplicantController::class, 'destroy'])->name('admin.applicant.destroy');

    // membership
    Route::get('membership', [MembershipController::class, 'index'])->name('admin.membership');
    Route::get('membership/get/{id}', [MembershipController::class, 'getByid'])->name('admin.membership.get');
    Route::post('membership/status/{id}', [MembershipController::class, 'status'])->name('admin.membership.status');
    Route::delete('membership/destroy/{id}', [MembershipController::class, 'destroy'])->name('admin.membership.destroy');

    // page
    Route::get('page', [PageController::class, 'index'])->name('admin.page');
    Route::get('page/create', [PageController::class, 'create'])->name('admin.page.create');
    Route::get('page/edit/{id}', [PageController::class, 'edit'])->name('admin.page.edit');
    Route::post('page/store', [PageController::class, 'store'])->name('admin.page.store');
    Route::delete('page/destroy/{id}', [PageController::class, 'destroy'])->name('admin.page.destroy');

    // province
    Route::get('province', [ProvinceController::class, 'index'])->name('admin.province');
    Route::get('province/edit/{id}', [ProvinceController::class, 'edit'])->name('admin.province.edit');
    Route::post('province/store', [ProvinceController::class, 'store'])->name('admin.province.store');
    Route::delete('province/destroy/{id}', [ProvinceController::class, 'destroy'])->name('admin.province.destroy');

    //  city
    Route::get('city', [CityController::class, 'index'])->name('admin.city');
    Route::get('city/edit/{id}', [CityController::class, 'edit'])->name('admin.city.edit');
    Route::post('city/store', [CityController::class, 'store'])->name('admin.city.store');
    Route::delete('city/destroy/{id}', [CityController::class, 'destroy'])->name('admin.city.destroy');
});
Route::group(['prefix' => 'employer', 'middleware' => ['auth', 'verified', 'role:employer', 'is_employer']], function () {
    Route::get('employer/get/{id}', [EmployerProfileController::class, 'get'])->name('employer.employer.get');
    Route::get('{username}/{edit}/edit', [EmployerProfileController::class, 'edit'])->name('employer.profile.edit');

    Route::post('profile/store/{step}', [EmployerProfileController::class, 'store'])->name('employer.profile.store');
    Route::delete('profile/destroy/{name}', [EmployerProfileController::class, 'logo_destroy'])->name('employer.logo.destroy');

    Route::middleware(['employer.verified'])->group(function () {
        // vacancy
        Route::get('{username}/vacancy', [EmployerVacancyController::class, 'index'])->name('employer.vacancy');
        Route::get('{username}/vacancy/create', [EmployerVacancyController::class, 'create'])->name('employer.vacancy.create');
        Route::get('vacancy/edit/{slug}', [EmployerVacancyController::class, 'edit'])->name('employer.vacancy.edit');
        Route::post('vacancy/store/{step}', [EmployerVacancyController::class, 'store'])->name('employer.vacancy.store');
        Route::delete('vacancy/destroy/{id}', [EmployerVacancyController::class, 'destroy'])->name('employer.vacancy.destroy');

        // applicant
        Route::get('{username}/applicant', [EmployerApplicantController::class, 'index'])->name('employer.applicant');
        Route::post('applicant/status/{id}/{status}', [EmployerApplicantController::class, 'status'])->name('employer.applicant.status');
        Route::get('applicant/get/{id}', [EmployerApplicantController::class, 'getByid'])->name('employer.applicant.get');
    });
});


Route::group(['prefix' => 'seeker', 'middleware' => ['auth', 'verified', 'role:seeker', 'is_seeker']], function () {

    Route::get('{username}/application/{slug}', [SeekerApplicantController::class, 'index'])->name('application');
    Route::post('documents/store', [SeekerApplicantController::class, 'documents_store'])->name('documents.store');
    Route::delete('documents/destroy/{name}', [SeekerApplicantController::class, 'documents_destroy'])->name('documents.destroy');
    Route::post('application/store', [SeekerApplicantController::class, 'application_store'])->name('application.store');
    Route::delete('application/destory/{id}', [SeekerApplicantController::class, 'application_destroy'])->name('application.destory');

    Route::get('{username}/{edit}/edit', [SeekerProfileController::class, 'edit'])->name('seeker.profile.edit');
    Route::post('profile/store/{step}', [SeekerProfileController::class, 'store'])->name('seeker.profile.store');
    Route::delete('profile/destroy/{name}', [SeekerProfileController::class, 'logo_destroy'])->name('seeker.logo.destroy');
});

// file manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

require __DIR__ . '/auth.php';