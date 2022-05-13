<?php

namespace App\Http\Controllers\Auth;

use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $data = [
            'title' => 'Login',
            'pages' => Page::where('carousel', '0')->where('status', 'active')->get(),
        ];
        return view('auth.login', $data);
    }


    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        $remember = $request->remember ? true : false;

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } else if (Auth::user()->hasRole('employer')) {
            return redirect()->route('employer.profile', Auth::user()->username);
        } else if (Auth::user()->hasRole('seeker')) {
            return redirect()->route('seeker.profile', Auth::user()->username);
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}