<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Categories::all();
    // dd($categories);
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
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('client.checkout');
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
});
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');
