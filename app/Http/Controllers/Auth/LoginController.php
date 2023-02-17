<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Login\RememberMeExpiration;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use RememberMeExpiration;

    /**
     * Display login page.
     *
     * @return Application|Factory|View
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return RedirectResponse
     * @throws BindingResolutionException
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        if ($request->get('remember')) {
            $this->setRememberMeExpiration($user);
        }

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param $user
     *
     * @return RedirectResponse
     */
    protected function authenticated(Request $request, $user): RedirectResponse
    {
        return redirect()->intended();
    }
}
