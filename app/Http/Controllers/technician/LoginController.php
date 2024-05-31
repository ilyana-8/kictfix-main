<?php

namespace App\Http\Controllers\technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //will show technician login page
    public function index(){
        return view('technician.login');
    }

    //will authenticate technician
    public function authenticate(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'

        ]);

        if ($validator->passes()) {

            if (Auth::guard('technician')->attempt(['email'=> $request->email,'password'=> $request->password ])) {

                if(Auth::guard('technician')->user()->role !="technician"){
                    Auth::guard('technician')->logout();
                    return redirect()->route('technician.login')->with('error','You are not authorized to access this page.');
                }

                return redirect()->route('technician.dashboard');
            } else {
                return redirect()->route('technician.login')->with('error','Either email or password is incorrect.
                ');
            }

        } else {
            return redirect()->route('technician.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    //logout technician
    public function logout() {
        Auth::guard('technician')->logout();
        return redirect()->route('technician.login');

    }

}
