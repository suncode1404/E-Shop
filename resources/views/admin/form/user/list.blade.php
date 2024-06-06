@extends('admin.layout')
@section('title', 'Danh sách user')
@section('content')
    {{-- Tittle --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="fs-4">Quản lý thành viên</div>
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Thêm thành viên
        </a>
    </div>

    {{-- Funtion --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        {{-- List trang thái thành viên --}}
        <div class="btn-group my-3 d-flex flex-wrap " role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-primary">All</button>
            <button type="button" class="btn btn-outline-primary">Active</button>
            <button type="button" class="btn btn-outline-primary">Inactive</button>
        </div>

        <div class=" d-flex align-items-center justify-content-between">
            {{-- Tìm kiếm thành viên --}}
            <form class="input-group me-2 flex-wrap">
                <input type="text" class="form-control" placeholder="Nhập nội dung">
                <span class="input-group-text bg-primary text-white">Tìm kiếm</span>
            </form>
            {{-- Lọc nhóm thành viên --}}

            <div class="filter d-flex">
                <div class="title-filter mx-2">Lọc:</div>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Chọn kiểu user
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Admin</a></li>
                        <li><a class="dropdown-item" href="#">Vender</a></li>
                        <li><a class="dropdown-item" href="#">User</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User name</th>
                <th scope="col" class="d-md-none d-sm-none d-none d-lg-block">Email</th>
                <th scope="col">Vai trò</th>
                <th scope="col" class="d-md-none d-sm-none d-none d-lg-block">Join</th>
                <th scope="col">Status</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">#{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ gmdate('d/m/Y H:m:s', strtotime($user->created_at) + 3600 * 7) }}</td>
                    <td>{{ $user->status }}</td>
                    {{-- CRUD  --}}
                    <td>
                        <div class="d-flex gap-3">
                            <a href="" class="badge ">active</a>
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.user.edit', $user->id) }}">Sửa</a>
                                    </li>
                                    <li>
                                        <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#Delete{{ $user->id }}"> {{-- #ten+ id  --}}
                                            Xóa
                                        </div>
                                        {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="Delete{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('admin.user.destroy',$user->id)}}" method="POST">
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
    <div class="d-flex justify-content-center">{{ $users->links('pagination::bootstrap-4') }}</div>
@endsection
