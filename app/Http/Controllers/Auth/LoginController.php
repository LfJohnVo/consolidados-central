<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:gerente')->except('logout');
    }

    public function authenticateG()
    {
        $credentials =  request()->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('gerente')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])){
            dd(Auth::guard('gerente')->user());
            return redirect(route('h_gerente'));
        }
        //dd($credentials['email'], $credentials['password']);
        //auth()->guard('gerente')->attempt($credentials);
        //dd("Authentication passed...");
        return redirect( route('login_g'));
    }

    public function showLoginFormG()
    {
        return view('auth_gerente.login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

}
