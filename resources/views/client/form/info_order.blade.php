@extends('client.layout')
@section('title', 'Thông tin đơn hàng')
@section('content')
    <div class="container mt-5">
        @foreach ($order as $od)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Thông tin khách hàng</h5>
                    <p class="card-text"><strong>Tên khách hàng:</strong> {{$od->name}}</p>
                    <p class="card-text"><strong>Địa chỉ:</strong> {{$od->address}}</p>
                    <p class="card-text"><strong>Số điện thoại:</strong> {{$od->phone}}</p>
                    <p class="card-text"><strong>Trạng thái đơn hàng:</strong> {{$od->status->name}}</p>
                    <p class="card-text"><strong>Phương thức thanh toán:</strong> {{$od->payment->name}}</p>
                </div>
            </div>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Trạng thái</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Ghi chú</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ORD00{{$od->id}}</td>
                        <td>{{$od->status->name}}</td>
                        <td>{{$od->quantity}}</td>
                        <td>{{number_format($od->total_price,0,'.','.')}}đ</td>
                        <td>{{$od->customer_notes}}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-primary text-light @if ($od->status_id == 5)
                                    d-none
                                @endif" href="{{route('client.order.cancel',$od->id)}}">Hủy đơn hàng</a>
                                <a class="btn btn-primary text-light" href="{{route('client.order.detail',$od->id)}}">Chi tiết đơn hàng</a>
                                <button class="btn btn-success">In hóa đơn</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    </div>
@endsection
