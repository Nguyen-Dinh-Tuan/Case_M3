<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function cart()
    {
        $cart = Session('cart');
        return view('frontend.cart', compact('cart'));
    }

    public function account()
    {
    }

    public function checkout()
    {
        $cart = Session('cart');
        return view('checkout', compact('cart'));
    }
}
