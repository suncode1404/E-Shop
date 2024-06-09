<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::orderBy('id', 'desc')->paginate(6);
        return view('admin.form.order.list', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::where('id', $id)->first();
        if ($order->status_id < 4) {
            $order->update([
                'status_id' => $order->status_id + 1,
            ]);
        } else {
            toast('Đơn hàng đã giao không thể duyệt nữa!', 'error');
            return  redirect()->route('admin.order.index');
        }
        toast('Đơn hàng của bạn đã duyệt thành công', 'success');
        return  redirect()->route('admin.order.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::where('id', $id)->first();
        if ($order->status_id != 5) {
            $order->update([
                'status_id' => 5,
            ]);
        } else {
            toast('Đơn hàng đã hủy không thể hủy nữa!', 'error');
            return  redirect()->route('admin.order.index');
        }
        toast('Đơn hàng của bạn đã hủy thành công', 'success');
        return  redirect()->route('admin.order.index');
    }
}
