<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Log out account user.
     *
     * @return RedirectResponse
     */
    public function perform(): RedirectResponse
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('home');
    }
}
