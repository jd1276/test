<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Auth;


class AdminLoginController extends Controller
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
    protected $guard = 'admin';
    /**

     * Where to redirect users after login.

     *

     * @var string

     */

    protected $redirectTo = '/admin';

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()
    {
        //header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        //header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

//        header("cache-Control: no-store, no-cache, must-revalidate, max-age=0");
//        header("cache-Control: post-check=0, pre-check=0", false);
//        header("Pragma: no-cache");
//        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        $this->middleware('admin')->except('logout');
    }

    public function showLoginForm()
    {
        if(auth()->guard('admin')->check())
        {
            //redirect()->route('admin-dashboard');
            //return URL::route('admin-dashboard');
            return view('admin-dashboard');
        }
        return view('admin_login');
    }

    public function dashboard()
    {
        if(auth()->guard('admin')->check()) {
            //return redirect('dashboard');
//            /return redirect()->route('admin-dashboard');
            //return new RedirectResponse('/dashboard');
            //return redirect()->to('/dashboard');
            //return Redirect::to('/dashboard');
            //return URL::route('admin-dashboard');
            //return Redirect::intended('/dashboard');
            //return redirect()->intended()->getTargetUrl();
            return redirect('/dashboard');
            //return redirect(route('admin-dashboard'));
            //return view('admin-dashboard');
        }
        return view('admin_login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return view('admin-dashboard');
//            //return redirect()->route('admin-dashboard');
//            //return redirect()->route('admin-dashboard');
//            //redirect()->intended()->route('admin-dashboard');
        }


        return redirect()->route('admin')->withError('Email or password are wrong.');
    }

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->route( 'admin' );
    }
}
