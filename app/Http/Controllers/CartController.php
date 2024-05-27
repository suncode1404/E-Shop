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
        $cartItemAll =  session('cart' . Auth::id());
        return view('client.form.cart', compact("title", "cartItemAll"));
    }
    public function checkout()
    {
        $title = 'Thanh toán';
        $cartItems = session()->get('cart' . Auth::id());
        if (count($cartItems) == 0) {
            // Session chứa các phần tử và không rỗng
            toast('Phải có sản phẩm mới được đặt hàng', 'error');
            return redirect()->back();
        }
        //Lấy user
        $user = Auth::user();
        return view('client.form.checkout', compact("title","user"));
    }

    public function add(string $id)
    {
        // Lấy thông tin sản phẩm từ yêu cầu
        $product = Product::findOrFail($id);
        // Lấy giỏ hàng hiện tại của người dùng
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart && $cart->total_price != 0) {
            // Giỏ hàng hiện tại có total khác 0, không cần tạo mới giỏ hàng
            // Thực hiện các thao tác khác tại đây nếu cần
            $cart = Cart::create([
                'user_id' => Auth::id(),
                // Các trường khác có thể cần thiết cho việc tạo giỏ hàng mới
            ]);
        } else {
            // Nếu không có giỏ hàng hoặc total = 0, tạo mới giỏ hàng
            $cart = Cart::firstOrCreate([
                'user_id' => Auth::id()
            ]);
        }
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

        // Lấy tất cả các mục trong giỏ hàng sau khi cập nhật
        $cartItemAll = CartItem::where('cart_id', $cart->id)->get();
        // Thêm biến cartItem vào session
        session()->put('cart' . Auth::id(), $cartItemAll);
        // Chuyển hướng người dùng về trang trước đó
        return redirect()->back();
    }
    public function addProduct(string $id, Request $request)
    {
        // Lấy thông tin sản phẩm từ yêu cầu
        $product = Product::findOrFail($id);
        // Lấy giỏ hàng hiện tại của người dùng
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart && $cart->total_price != 0) {
            // Giỏ hàng hiện tại có total khác 0, không cần tạo mới giỏ hàng
            // Thực hiện các thao tác khác tại đây nếu cần
            $cart = Cart::create([
                'user_id' => Auth::id(),
                // Các trường khác có thể cần thiết cho việc tạo giỏ hàng mới
            ]);
        } else {
            // Nếu không có giỏ hàng hoặc total = 0, tạo mới giỏ hàng
            $cart = Cart::firstOrCreate([
                'user_id' => Auth::id()
            ]);
        }
        // Lấy thông tin sản phẩm trong giỏ hàng
        $cartItem = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'product_id' => $product->id
        ]);

        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
        if ($cartItem->exists) {
            $cartItem->quantity += $request->quantity_available;
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
            $cartItem->quantity = $request->quantity_available;
            $cartItem->price = $product->price;
        }

        // Lưu thông tin sản phẩm trong giỏ hàng
        $cartItem->save();

        // Lấy tất cả các mục trong giỏ hàng sau khi cập nhật
        $cartItemAll = CartItem::where('cart_id', $cart->id)->get();
        // Thêm biến cartItem vào session
        session()->put('cart' . Auth::id(), $cartItemAll);
        // Chuyển hướng người dùng về trang trước đó
        return redirect()->back();
    }
    public function logout(string $id)
    {
        // Lấy giỏ hàng từ session
        $cart = session('cart' . Auth::id());
        CartItem::where('id', $cart[$id]->id)->delete();
        unset($cart[$id]);
        // Cập nhật lại chỉ số index
        // array_values($cart->toArray());
        session()->put('cart' . Auth::id(), $cart);
        // Chuyển hướng về trang hiển thị giỏ hàng
        return redirect()->back();
    }

    public function payment() {
        alert('Đặt hàng thành công','Cảm ơn quý khách đã tin tưởng dịch vụ của E-shop','success');
        return  redirect()->route('client.home');
    }
}
