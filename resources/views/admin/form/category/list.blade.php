@extends('admin.layout')
@section('title', 'Danh sách danh mục')
@section('content')
    {{-- Tittle --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="fs-4">Quản lý thành viên</div>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Thêm sản phẩm
        </a>
    </div>


    <table class="table">
        <thead>
            <tr class="text-center align-middle">
                <th scope="col">#</th>
                <th scope="col">Tên loại sản phẩm</th>
                <th scope="col">Thứ tự</th>
                <th scope="col">Ẩn hiện</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cg)
                <tr class="text-center align-middle">
                    <th scope="row">#CT{{ $cg->id }}</th>

                    <td>{{ $cg->name }}</td>
                    <td>{{ $cg->priority }}</td>
                    <td>{{ $cg->hidden == 0 ? 'ẩn' : 'hiện' }}</td>
                    <td>{{ gmdate('d/m/Y H:m:s', strtotime($cg->created_at) + 3600 * 7) }}</td>
                    {{-- CRUD  --}}
                    <td>
                        <div class="d-flex gap-3">
                            <a href="" class="badge ">active</a>
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.category.edit', $cg->id) }}">Sửa</a>
                                    </li>
                                    <li>
                                        <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#Delete{{ $cg->id }}"> {{-- #ten+ id  --}}
                                            Xóa
                                        </div>
                                        {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="Delete{{ $cg->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('admin.category.destroy', $cg->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa loại sản phẩm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc xóa loại sản phẩm này?
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
    <div class="d-flex justify-content-center">{{ $categories->links('pagination::bootstrap-4') }}</div>
@endsection
