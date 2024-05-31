<?php

namespace App\Http\Controllers\technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   //show dahsboard page technician
   public function index(){
    return view ('technician.dashboard');
 }
}

