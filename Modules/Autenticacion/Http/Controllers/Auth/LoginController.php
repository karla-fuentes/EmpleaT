<?php

namespace Modules\Autenticacion\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Modules\Usuarios\Entities\Usuario as User;
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
    protected $redirectTo = 'home';

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('autenticacion::auth.login');
    }



    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => [
                'required',
                // 'regex:' . config('autenticacion.password_regex'),
                'string',
                'min:8'
            ]
        ]);

        // Attempt to log the user in
        if (Auth::guard('acceso')->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'activo' => 1
        ], $request->remember))
        {
            // if successful, then redirect to their intended location
            return redirect()->intended(route($this->redirectTo));
        }

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()
            ->with('alert_error',__('auth.failed'))
            ->withInput($request->only('email', 'remember'));
    }



    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
