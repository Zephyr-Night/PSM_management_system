<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //if user (lecture/student) suddently exit or close browser
        //the system check type of user by using session get() method


        $getsessionisLecture = session()->get('islecture');

        if ($getsessionisLecture == true ) {// do your magic here
            return view('lecturedashboard');
        }
        else
        {
            return view('studentdashboard');
        }
    }
}
