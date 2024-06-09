@extends('admin.layout')
@section('title', 'Danh sách đơn hàng')
@section('content')
    {{-- Tittle --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="fs-4">Quản lý đơn hàng</div>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Thêm đơn hàng
        </a>
    </div>


    <table class="table">
        <thead>
            <tr class="text-center align-middle">
                <th scope="col">Đơn hàng</th>
                <th scope="col">Tên người đặt</th>
                <th scope="col">Phương thức thanh toán</th>
                <th scope="col">Tổng sản phẩm</th>
                <th scope="col">Tổng giá tiền</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order as $od)
                <tr class="text-center align-middle">
                    <th scope="row">#OD{{ $od->id }}</th>

                    <td>{{ $od->name }}</td>
                    <td>{{ $od->payment->name }}</td>
                    <td>{{ $od->quantity }}</td>
                    <td>{{ number_format($od->total_price,0,'.','.') }}đ</td>
                    <td>{{ $od->customer_notes }}</td>
                    <td>{{ $od->status->name }}</td>
                    <td>{{ gmdate('d/m/Y H:m:s', strtotime($od->created_at) + 3600 * 7) }}</td>
                    {{-- CRUD  --}}
                    <td>
                        <div class="d-flex gap-3">
                            <a href="" class="badge ">active</a>
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.order.edit', $od->id) }}">Duyệt đơn</a>
                                    </li>
                                    <li>
                                        <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#Delete{{ $od->id }}"> {{-- #ten+ id  --}}
                                            Hủy đơn
                                        </div>
                                        {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="Delete{{ $od->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('admin.order.destroy', $od->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hủy đơn hàng</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc hủy đơn hàng này?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                    <button type="sumbit" class="btn btn-danger">Xác nhận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">{{ $order->links('pagination::bootstrap-4') }}</div>
@endsection
