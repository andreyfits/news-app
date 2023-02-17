<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return Application|Factory|View
     */
    public function show(): Application|Factory|View
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        Auth::login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
