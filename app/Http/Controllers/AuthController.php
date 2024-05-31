<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    //login page for student/staff
   public function index() {
        return view('login');

    }

    //will authenticate student/staff
    public function authenticate(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'

        ]);

        if ($validator->passes()) {

            if(Auth::attempt(['email'=> $request->email,'password'=> $request->password ])) {
                return redirect()->route('account.dashboard');
            } else {
                return redirect()->route('account.login')->with('error','Either email or password is incorrect.
                ');
            }

        } else {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    //will authenticate user
    public function register(Request $request){
        return view('register');

    }

    public function processRegister(Request $request){


        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'name' => 'required',
            'matric_id' => 'required',
            'phone_number' => 'required',


        ]);

        if ($validator->passes()) {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->matric_id = $request->matric_id; // Ensure matric_id is set
                $user->phone_number = $request->phone_number;
                $user->password = Hash::make($request->password);
                $user->role = 'student/staff';

            $user->save();

            return redirect()->route('account.login')->with('success','You have registed succesfully.');

        } else {
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }



}


