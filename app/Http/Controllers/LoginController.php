<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginBackendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
   public function showLogin()
   {
       return view('backend.login');
   }
   public function login(LoginBackendRequest $request)
   {
       $username = $request->user;
       $password = $request->password;

       if ($username == 'root' && $password == '123'){
           $request->session();
           $request->session()->push('login', true);

           return redirect()->route('welcome');
       }
       $message = 'Đăng nhập không thành công. Tên người dùng hoặc mật khẩu không đúng.';
       $request->session()->flash('login-fail', $message);

       return view('backend.login');
   }

    public function logout(Request $request)
    {
        //Auth::logout();
        Session::forget('login');
        return redirect()->route('show.login');

    }
}
