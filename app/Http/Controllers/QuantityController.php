<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuantityController extends Controller
{
    public function update(Request $request)
    {
        // Giả sử bạn có model Item, cập nhật số lượng ở đây
        $item = CartItem::find($request->idProduct);
        $cart = Cart::where('user_id', Auth::id())->first();
        if ($item) {
            $item->quantity = $request->quantity;
            $item->price = $request->priceProduct;
            $item->total_price = $request->priceProduct * $request->quantity;
            $item->save();
            $cartItemAll = CartItem::where('cart_id', $cart->id)->get();
            session()->put('cart' . Auth::id(), $cartItemAll);
            return response()->json(['status' => 'success', 'quantity' => $request->quantity]);
        }
        return response()->json(['status' => 'error', 'message' => 'Item not found']);
    }
}
