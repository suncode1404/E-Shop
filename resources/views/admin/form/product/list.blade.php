@extends('admin.layout')
@section('title', 'Danh sách user')
@section('content')
    {{-- Tittle --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="fs-4">Quản lý thành viên</div>
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Thêm sản phẩm
        </a>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ảnh sản phẩm</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hot</th>
                <th scope="col">View</th>
                <th scope="col">Heart</th>
                <th scope="col">Ẩn hiện</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $pd)
                <tr class="text-center align-middle">
                    <th scope="row">#SP{{ $pd->id }}</th>
                    <td>
                        <img src="{{ asset('images/product/' . $pd->image) }}" alt="" class="img-fluid" style="width: 200px">
                    </td>

                    <td>{{ $pd->name }}</td>
                    <td>{{ $pd->hot }}</td>
                    <td>{{ $pd->view }}</td>
                    <td>{{ $pd->heart }}</td>
                    <td>{{ $pd->hidden == 1 ? 'hiện' : 'ẩn' }}</td>
                    <td>{{ number_format($pd->price,0,'.','.') }}đ</td>
                    <td>{{ gmdate('d/m/Y H:m:s', strtotime($pd->created_at) + 3600 * 7) }}</td>
                    {{-- CRUD  --}}
                    <td>
                        <div class="d-flex gap-3">
                            <a href="" class="badge ">active</a>
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.product.edit', $pd->id) }}">Edit</a>
                                    </li>
                                    <li>
                                        <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#Delete{{ $pd->id }}"> {{-- #ten+ id  --}}
                                            Delete
                                        </div>
                                        {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="Delete{{ $pd->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('admin.product.destroy', $pd->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa tài khoản</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc xóa tài khoản này?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                    <button type="sumbit" class="btn btn-danger">Xóa</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">{{ $products->links('pagination::bootstrap-4') }}</div>
@endsection
