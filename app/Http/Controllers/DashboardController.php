<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //dashboard page for staff/student
    public function index(){
       return view('dashboard');

    }


}
