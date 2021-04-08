<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFrontendRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLogin(){
        return view('frontend.login');
    }


    public function showRegister()
    {
        return view('frontend.signup');
    }

    public function storeRegister(RegisterFormRequest $request)
    {

        $user = new Customer();
        $user->user = $request->input('user');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->save();
        return redirect()->route("showLogin");
    }

    public function login(LoginFrontendRequest $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::guard('customer')->attempt($data)) {

            return redirect()->route('home');
        }
        Session::flash('error_login', "Email hoặc mật khẩu không đúng.");
        return redirect()->route('showLogin');
    }
}
