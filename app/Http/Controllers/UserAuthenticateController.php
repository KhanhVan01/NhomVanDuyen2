<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserAuthenticateController extends Controller
{
    public function loginUser()
    {

        return view('user.login-user');
    }

    public function loginProcessUser(Request $request)
    {
        $emailStudent = $request->get('email-student');
        $passStudent = $request->get('password-student');
        try {
            $student = Student::where('email',$emailStudent)->where('passWord',$passStudent)->firstOrFail();
            $request->session()->put('user',$student);
            // dd($request);
            return Redirect::route('home-student');
        } catch (Exception $e) {
            return Redirect::route('login-student')->with('error',"Tài khoản hoặc mật khẩu của bạn bị sai!");
        }
    }

    public function logoutUser(Request $request)
    {
        $request->session()->pull('user');
        return Redirect::route('login-student');

    }
}
