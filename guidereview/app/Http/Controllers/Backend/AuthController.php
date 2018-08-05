<?php

namespace App\Http\Controllers\Backend;

use App\Helper;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    public function __construct()
    {
        $this->redirectTo = Helper::currentRoutePrefix();
    }

    public function showLoginForm()
    {
        return view('backend.login');
    }

    protected function credentials(Request $request)
    {
        $current_user = User::where('username', $request->input('username'))->first();
        //dd($current_user);
        $request->session()->put('current_user', $current_user);
        return $request->only('channel', $this->username(), 'password');
    }

    protected function username()
    {
        $login = request()->input('usernameOrEmail');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field => $login]);
        return $field;
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect(Helper::currentRoutePrefix());
    }

}
