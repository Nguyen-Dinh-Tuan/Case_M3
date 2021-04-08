<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLineController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function (){
    Route::get('login', [LoginController::class, 'showLogin'])->name('show.login');
    Route::post('/login', [LoginController::class, 'login'])->name('user.login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//    Route::get('/login', function () {
//        return view('backend.login');
//    });




    Route::group(['prefix' => 'customers'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
        Route::post('/create', [CustomerController::class, 'store'])->name('customers.store');
        Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
        Route::post('/{id}/edit', [CustomerController::class, 'update'])->name('customers.update');
        Route::get('/{id}/delete', [CustomerController::class, 'destroy'])->name('customers.destroy');
        Route::post('/search', [CustomerController::class, 'search'])->name('customers.search');
    });

    Route::group(['prefix' => 'productlines'], function () {
        Route::get('/', [ProductLineController::class, 'index'])->name('productlines.index');
        Route::get('/{id}/detail',[\App\Http\Controllers\ProductLineController::class,'show'])->name('productlines.id');
        Route::get('/create', [ProductLineController::class, 'create'])->name('productlines.create');
        Route::post('/create', [ProductLineController::class, 'store'])->name('productlines.store');
        Route::get('/{id}/edit', [ProductLineController::class, 'edit'])->name('productlines.edit');
        Route::post('/{id}/edit', [ProductLineController::class, 'update'])->name('productlines.update');
        Route::get('/{id}/delete', [ProductLineController::class, 'delete'])->name('productlines.delete');
        Route::post('/search', [ProductLineController::class, 'search'])->name('productlines.search');
    });


    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.list');
        Route::get('/{id}/detail',[ProductController::class,'show'])->name('products.id');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/{id}/edit', [ProductController::class, 'update'])->name('products.update');
        Route::get('/{id}/delete', [ProductController::class, 'destroy'])->name('products.delete');
        Route::post('/search', [ProductController::class, 'search'])->name('product.search');

    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.list');
        Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
        Route::post('/create', [OrderController::class, 'store'])->name('orders.store');
        Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
        Route::post('/{id}/edit', [OrderController::class, 'update'])->name('orders.update');
        Route::get('/{id}/delete', [OrderController::class, 'delete'])->name('orders.delete');
//    Route::get('/detail/{id}', [OrderController::class, 'show'])->name('orders.show');
    });


    Route::get('/welcome', function () {
        return view('backend.welcome');
    })->name('welcome');
});

//Route::get('/', function () {
//    $products = Product::paginate(12);
//    return view('frontend.shop',compact('products'));
//})->name('home');
Route::get('/', [\App\Http\Controllers\frontend\ProductController::class, 'index'])->name('home');



Route::group(['prefix' => 'user'], function () {


    Route::get("login", [\App\Http\Controllers\frontend\LoginController::class, "showLogin"])->name("showLogin");
    Route::post("login/frontend", [\App\Http\Controllers\frontend\LoginController::class, 'login'])->name('frontend.login');
    Route::get("register", [\App\Http\Controllers\frontend\LoginController::class, "showRegister"])->name("showRegister");
    Route::post("register", [\App\Http\Controllers\frontend\LoginController::class, "storeRegister"])->name("storeRegister");
    Route::get('logoutfrontend', [\App\Http\Controllers\frontend\LoginController::class, 'logout'])->name('frontend.logout');


    Route::get('/list', [\App\Http\Controllers\frontend\ProductController::class, 'index'])->name('products.show');
    Route::get('/{id}/list', [\App\Http\Controllers\frontend\ProductController::class, 'showProductline'])->name('productline.detail');
    Route::get('/{id}/showProduct', [\App\Http\Controllers\frontend\ProductController::class, 'showProduct'])->name('products.detail');
    Route::get('/{id}/menu',[\App\Http\Controllers\frontend\ProductController::class,'show'])->name('show.menu');
    Route::get('/show',[\App\Http\Controllers\frontend\ProductController::class,'indexpl']);
    Route::get('/index',[\App\Http\Controllers\frontend\ProductController::class,'indexMaster'])->name('index.index');

    //Đăng nhập và đăng kí ở trang checkout

    Route::prefix('cart')->group(function () {
        Route::get('/', [HomeController::class, 'cart'])->name('cart.index');
        Route::get('/{id}/add', [CartController::class, 'addProduct'])->name('cart.add');
        Route::get('/{id}/delete', [CartController::class, 'deleteProduct'])->name('cart.delete');
        Route::get('/deleteAll', [CartController::class, 'deleteCart'])->name('cart.deleteAll');
        Route::post('cart/update-cart',[CartController::class,'updateCart'])->name('cart.update');
        Route::get('check-out',[CartController::class,'showFormCheckOut'])->name('cart.checkout');
        Route::post('check-out',[CartController::class,'checkOut'])->name('cart.submit_checkout');
    });
});
