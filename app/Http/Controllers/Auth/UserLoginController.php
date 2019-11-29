<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
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
    protected $guard = 'web';

    /**

     * Where to redirect users after login.

     *

     * @var string

     */

//    protected $redirectTo = '/user';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if(auth()->guard()->check())
        {
            return view('user-dashboard');
        }
        return view('user_login');
    }

    public function registerForm()
    {
        if(auth()->guard()->check())
        {
            return view('user-dashboard');
        }
        return view('register');
    }

    public function dashboard()
    {
        if(auth()->guard()->user()) {
            return view('user-dashboard');
        }
        return view('user_login');
    }

    public function login(Request $request)
    {
        if (auth()->guard()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return view('user-dashboard');
        }
        return redirect()->route('login')->withError('Email or password are wrong.');
    }

    public function logout(Request $request)
    {
        auth()->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route( 'login' );
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('register')->withError($validator->errors()->first());
        }

        User::create([
        'name' => $request['name'],
        'email' =>$request['email'],
        'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('login')->withSuccess('You are successfully registered');
    }
}
