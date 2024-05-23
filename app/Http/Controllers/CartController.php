<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $title = 'Giỏ hàng';
        return view('client.form.cart', compact("title"));
    }
    public function checkout()
    {
        $title = 'Thanh toán';
        return view('client.form.checkout', compact("title"));
    }

    public function add(string $id)
    {
        // // Lấy thông tin sản phẩm
        $product = Product::findOrFail($id);
        // Thêm sản phẩm vào giỏ hàng
        $cart = session()->get('cart', []);
        // dd($cart);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "user" => Auth::user(),
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        // dd($cart);
        session()->put('cart', $cart);
        // Chuyển hướng về trang hiển thị giỏ hàng
        return redirect()->back();
    }

    // public function add(string $id)
    // {
    //     $product = Product::findOrFail($id);

    //     // Kiểm tra xem người dùng có đăng nhập không
    //     if (Auth::check()) {
    //         // Người dùng đã đăng nhập
    //         // Lưu sản phẩm vào giỏ hàng của người dùng
    //         $cart = Cart::where('user_id', Auth::id())->where('product_id', $id)->first();
    //         if ($cart) {
    //             $cart->quantity++;
    //             $cart->save();
    //         } else {
    //             Cart::create([
    //                 'user_id' => Auth::id(),
    //                 'product_id' => $id,
    //                 'quantity' => 1,
    //                 'price' => $product->price,
    //                 'image' => $product->image
    //             ]);
    //         }
    //     } else {
    //         // Người dùng chưa đăng nhập
    //         // Lưu sản phẩm vào giỏ hàng trong session
    //         $cart = session()->get('cart', []);
    //         if (isset($cart[$id])) {
    //             $cart[$id]['quantity']++;
    //         } else {
    //             $cart[$id] = [
    //                 "name" => $product->name,
    //                 "quantity" => 1,
    //                 "price" => $product->price,
    //                 "image" => $product->image
    //             ];
    //         }
    //         session()->put('cart', $cart);
    //     }

    //     return redirect()->back();
    // }
    public function logout(string $id)
    {
        // Lấy giỏ hàng từ session
        $cart = session('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        // Chuyển hướng về trang hiển thị giỏ hàng
        return redirect()->back();
    }
}
