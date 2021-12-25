<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsTrue;

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

    protected function authenticated(Request $request, $user)
    {
        //save data(userId) to session using put()
        $saveuserid = $user->id;
        $checkiflecture = $user->islecture;

        $request->session()->put(['userprimarykey'=>$saveuserid]);
        $request->session()->put(['islecture'=>$checkiflecture]);

    if ($user->islecture == true ) {// do your magic here
        return view('lecturedashboard');
    }

    return redirect('/studentdashboard');
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
