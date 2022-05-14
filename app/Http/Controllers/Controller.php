<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use Laratrust\Laratrust;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    public function __construct()
    {
        $puskar = User::whereRoleIs('admin')->first();
        $pages = Page::where('carousel', '0')->where('status', 'active')->get();
        View::share(compact(['pages', 'puskar']));
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}