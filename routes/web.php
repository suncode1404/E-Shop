<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuantityController;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Categories::all();
    //Phương thức active lấy ra sản phẩm active mặc định 8 sp
    $products = Product::active(8)->get();
    //Phương thức hot lấy ra sản phẩm hot mặc định 8 sp
    $productHot = Product::hot()->get();
    return view('client.form.home', compact("products", "productHot", 'categories'));
})->name('client.home');

Route::fallback(function () {
    return redirect()->back();
});

Route::get('/shop', [ProductController::class, 'index'])->name('client.shop');
Route::get('/shop/related/{id?}', [ProductController::class, 'related'])->name('client.shop.related');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('client.product');

Route::get('/contact', [ContactController::class, 'index'])->name('client.contact');
Route::get('/cart', [CartController::class, 'cart'])->name('client.cart');

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
    //Add product in cart
    Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('client.cart.add');
    Route::post('/cart/addProduct/{id}', [CartController::class, 'addProduct'])->name('client.cart.addProduct');
    Route::get('/cart/logout/{id}', [CartController::class, 'logout'])->name('client.cart.logout');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('client.checkout');
    Route::post('/car/payment', [CartController::class, 'payment'])->name('client.cart.payment');
    Route::post('/update-quantity', [QuantityController::class, 'update'])->name('quantity.update');
    //Đơn hàng
    Route::get('/order', [OrderController::class, 'order'])->name('client.order');
    //Hủy đơn hàng
    Route::get('/order/{id}/cancel', [OrderController::class, 'cancelOrder'])->name('client.order.cancel');
    Route::get('/order/detail/{id}', [OrderController::class, 'order_detail'])->name('client.order.detail');
    //Bình luận
    Route::post('/luubinhluan', [ProductController::class, 'luubinhluan'])->name('client.binhluan');
    Route::post('/upload', [ProductController::class, 'upload'])->name('ckeditor.upload');
});
Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('product', AdminProductController::class);
});
