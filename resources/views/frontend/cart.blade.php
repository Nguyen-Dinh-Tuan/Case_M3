@extends('layouts.master')
@section('body')
    @include('layouts.core.navbar')

    <div class="hero-wrap hero-bread" style="background-image: url('{{asset('frontend/images/bg_1.jpg')}}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <form action="{{ route('cart.update') }}" method="post">
                            @csrf
                            <table class="table">
                                <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($cart) && !empty($cart->items))
                                    @foreach($cart->items as $key => $item)
                                        <tr class="text-center">
                                            <td class="product-remove"><a
                                                    onclick="return confirm('Are you sure delete : {{$item['item']['productName']}}')"
                                                    href="{{route('cart.delete', $item['item']['id'])}}"><span
                                                        class="ion-ios-close"></span></a>
                                            </td>
                                            <td class="image-prod">
                                                <img src="{{ asset('storage/images/'.$item['item']['img']) }}"
                                                     width="150" alt="">
                                            </td>

                                            <td class="product-name">
                                                <h3>{{$item['item']['productName']}}</h3>
                                            </td>

                                            <td class="price">
                                                <p>{{$item['item']['price']}}$</p>
                                            </td>

                                            <td class="quantity">
                                                <div class="input-group mb-3">
                                                    <input type="number" name="quantity_product[{{$key}}]"
                                                           class="quantity form-control input-number"
                                                           value="{{$item['totalQty']}}" min="1"
                                                           max="100">
                                                </div>
                                            </td>

                                            <td class="total">{{$item['totalPrice']}}$</td>

                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <div>
                                <button class="btn btn-primary" type="submit">Update</button>
                                <a onclick="return confirm('Ban chac chan muon xoa het? ')" href="{{ route('cart.deleteAll') }}" class="btn btn-primary">Delete</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Coupon Code</h3>
                        <p>Enter your coupon code if you have one</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Coupon code</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Estimate shipping and tax</h3>
                        <p>Enter your destination to get a shipping estimate</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="country">State/Province</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="country">Zip/Postal Code</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>$20.60</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>$3.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>$17.60</span>
                        </p>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                    <span>Get e-mail updates about our latest shops and special offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.core.footer')
@endsection
