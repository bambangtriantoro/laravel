<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $request->user()->authorizeRoles(['employee','manager']);
        // return view('index');
        
        if ($request->user()->hasRole('manager')) {
            return view ('layouts/mainadmin');
        }if ($request->user()->hasRole('employee')) {
            return view ('/home');
        }
    }
}
