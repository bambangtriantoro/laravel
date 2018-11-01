<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
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
