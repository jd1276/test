<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
//        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
//            return redirect()->route('admin');
//        }
//        elseif(auth()->attempt(['email' => $request->email, 'password' => $request->password]))
//        {
//            return redirect()->route('home');
//        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
}
