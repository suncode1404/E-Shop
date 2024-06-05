<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order() {
        $order = Order::where('user_id',Auth::id())->orderBy('id','desc')->paginate(3);
        return view('client.form.info_order',compact('order'));
    }
    public function order_detail(string $id) {
        $order = Order::where('id',$id)->get()->first();
        $orderDetail = OrderDetail::where('order_id',$id)->get();
        return view('client.form.orderDetail',compact('orderDetail','order'));
    }
    public function cancelOrder(string $id) {
        $order = Order::where('id',$id)->get()->first();
        $order->status_id = 5;
        $order->save();
        alert('Bạn đã hủy đơn thành công', '', 'success');
        return redirect()->route('client.order');
    }
}
