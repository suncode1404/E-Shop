@extends('client.layout')
@section('title', 'Thông tin chi tiết')
@section('content')
    <div class="container mt-5">
        <a href="{{ route('client.order') }}" class="text-warning">
            <h6>Quay lại</h6>
        </a>
        <h2 class="my-4">Chi tiết đơn hàng</h2>

        <!-- Thông tin khách hàng -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Thông tin khách hàng</h5>
                <p class="card-text"><strong>Tên khách hàng:</strong> {{ $order->name }}</p>
                <p class="card-text"><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                <p class="card-text"><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                <p class="card-text"><strong>Trạng thái đơn hàng:</strong> {{ $order->status->name }}</p>
                <p class="card-text"><strong>Phương thức thanh toán:</strong> {{ $order->payment->name }}</p>

            </div>
        </div>

        <!-- Thông tin đơn hàng -->
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderDetail as $od)
                    <tr>
                        <td class="align-middle">ORD00{{ $od->id }}</td>
                        <td class="align-middle">
                            <img src="{{ asset('images/product/' . $od->product->image) }}" class="img-fluid rounded-start"
                                alt="..." style="height: 200px" >
                        </td>
                        <td class="align-middle">{{ $od->product->name }}</td>
                        <td class="align-middle">{{ $od->quantity }}</td>
                        <td class="align-middle">{{ number_format($od->product->price, 0, '.', '.') }}đ</td>
                        <td class="align-middle">{{ number_format($od->total_price, 0, '.', '.') }}đ</td>
                    </tr>
                @endforeach
                <!-- Thêm các sản phẩm khác nếu có -->
            </tbody>
        </table>
        <div class="text-center my-2">
            <div class="btn-group" role="group">
                <a class="btn btn-primary text-light @if ($order->status_id == 5) d-none @endif"
                    href="{{ route('client.order.cancel', $order->id) }}">Hủy đơn hàng</a>
                <button class="btn btn-success btn-sm">In hóa đơn</button>
            </div>
        </div>
    </div>
@endsection
