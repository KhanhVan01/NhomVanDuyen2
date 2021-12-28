<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthenticateController extends Controller
{
    public function loginAdmin(){
        return view('login');
    }
    
    public function loginProcessAdmin(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        try {
            $admin = Admin::where('email',$email)->where('password',$password)->firstOrFail();
            $request->session()->put('admin',$admin);
            return Redirect::route('dashboard-admin');
        }catch(Exception $e){
            return Redirect::route('login-admin')->with('error',"Tài khoản hoặc mật khẩu bị sai");
        }
    }

    public function logoutAdmin(Request $request)
    {
        $request->session()->pull('admin');
        return Redirect::route('login-admin');

    }
}
