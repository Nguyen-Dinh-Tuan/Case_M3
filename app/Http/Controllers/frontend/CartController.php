<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    const BILL_PENDING = 1;
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
        return redirect()->route('home')->with('error','Data Deleted');
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


    function showFormCheckOut()
    {
        $cart = session()->get('cart');

        return view('frontend.checkout', compact('cart'));
    }

    function checkOut(Request $request, Customer $customer, Order $order,Product $product) {
        $cart = session()->get('cart');

        DB::beginTransaction();

        try {
            $customer = new Customer();
            $customer->fill($request->all());
            $customer->save();

            $order = new Order();
            $order->customerNumber = $customer->id;
            $order->orderDate = date('Y-m-d');
            $order->requiredDate = date('Y-m-d');
            $order->shippedDate = date('Y-m-d');
            $order->status = self::BILL_PENDING;
            $order->save();

            foreach ($cart->items as $key => $item) {
                $orderDetail = new Orderdetail();
                $orderDetail->productCode = $key;
                $orderDetail->orderNumber = $order->id;
                $orderDetail->quantity = $item['totalQty'];
                $orderDetail->price = $item['totalPrice'];
                $orderDetail->save();
            }

            DB::commit();
            session()->forget('cart');
            return redirect('/');
        }catch (\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage());
        }

    }

}
