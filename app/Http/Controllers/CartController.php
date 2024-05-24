<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
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
        // Lấy thông tin sản phẩm từ yêu cầu
        $product = Product::findOrFail($id);
        
        // Lấy thông tin giỏ hàng của người dùng hiện tại
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id()
        ]);
        $cartItemAll = CartItem::where('cart_id',$cart->id)->get();
        // Lấy thông tin sản phẩm trong giỏ hàng
        $cartItem = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'product_id' => $product->id
        ]);

        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
        if ($cartItem->exists) {
            $cartItem->quantity++;
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
            $cartItem->quantity = 1;
            $cartItem->price = $product->price;
        }

        // Lưu thông tin sản phẩm trong giỏ hàng
        $cartItem->save();
        // Thêm biến cartItem vào session
        session()->put('cart'.Auth::id(), $cartItemAll);
        // dd(session('cart'.Auth::id()));
        // Chuyển hướng người dùng về trang trước đó
        return redirect()->back();
    }

    public function logout(string $id)
    {
        // Lấy giỏ hàng từ session
        $cart = session('cart'.Auth::id());
        unset($cart[$id]);
        session()->put('cart', $cart);
        // Chuyển hướng về trang hiển thị giỏ hàng
        return redirect()->back();
    }
}
