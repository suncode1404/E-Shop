<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart() {
        $title = 'Giỏ hàng';
        return view('client.form.cart', compact("title"));
    }
    public function checkout()
    {
        $title = 'Thanh toán';
        return view('client.form.checkout', compact("title"));
    }
}
