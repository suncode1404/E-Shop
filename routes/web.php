<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::take(8)->get();
    $productHot = Product::orderBy('heart', 'desc')->take(8)->get();
    return view('client.form.home', compact("products", "productHot"));
})->name('client.home');

Route::fallback(function() {
    return redirect()->back();
});

Route::get('/shop', [ProductController::class, 'index'])->name('client.shop');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('client.product');

Route::get('/contact', function () {
    $title = 'Liên hệ';
    return view('client.form.contact', compact("title"));
})->name('client.contact');
Route::get('/cart/checkout', function () {
    $title = 'Thanh toán';
    return view('client.form.checkout', compact("title"));
})->name('client.checkout');
Route::get('/cart', function () {
    $title = 'Giỏ hàng';
    return view('client.form.cart', compact("title"));
})->name('client.cart');
Route::group(['middleware' => ['guest']], function () {
    //Login
    Route::get('/login', [LoginController::class, 'index'])->name('account.login');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    //Register
    Route::get('/register', [LoginController::class, 'register'])->name('account.register');
    Route::post('/process-register', [LoginController::class, 'processRegister'])->name('account.process-register');

});
Route::group(['middleware' => ['users']], function () {
    //Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');
});
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');



