<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addProduct($id): RedirectResponse
    {
        $product = Product::find($id);
        $oldCart = Session('cart');

        $newCart = new Cart($oldCart);
        $newCart->addToCart($id, $product);
        Session::put('cart', $newCart);

        return back();
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('cart', ['product' => $product]);
    }

    public function deleteProduct($id): RedirectResponse
    {
        $product = Product::find($id);
        $oldCart = Session('cart');

        $newCart = new Cart($oldCart);
        $newCart->removeProduct($id, $product, 1);
        Session::put('cart', $newCart);

        return back();
    }

//    public function deleteAllProduct($id): RedirectResponse
//    {
//        $product = Product::find($id);
//        $oldCart = Session('cart');
//
//        $newCart = new Cart($oldCart);
//        $newCart->removeProduct($id, $product, -1);
//        Session::put('cart', $newCart);
//
//        return back();
//    }

    function deleteCart()
    {
        session()->forget('cart');
        return redirect()->route('home');
    }

    public function clearCart(): RedirectResponse
    {
        Session::forget('cart');
        return redirect()->route('cart');
    }

    function updateCart(Request $request): \Illuminate\Http\RedirectResponse
    {

        foreach ($request->quantity_product as $key => $value) {
            $oldCart = session()->get('cart');
            $newCart = new Cart($oldCart);
            $newCart->updateCart($key, $value);
            session()->put('cart', $newCart);
        }

        return back();
    }

}
