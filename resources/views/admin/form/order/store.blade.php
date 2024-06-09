@extends('admin.layout')

@section('title', 'Form danh mục sản phẩm')

@section('content')
    @php
        $hidden = ['Ẩn', 'hiện'];
    @endphp
    <a href="{{ route('admin.category.index') }}">Quay lại</a>
    <div class="card-body">
        <div class="fs-4 my-2">{{ $title }} người dùng </div>
        <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
            @csrf
            @method($method)
        
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Tên danh mục</label>
                    <input class="form-control" type="text" id="name" name="name"
                        value="{{ old('name', isset($category) ? $category->name : '') }}" placeholder="Nhập tên sản phẩm">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="priority" class="form-label">Thứ tự</label>
                    <input class="form-control" type="text" id="priority" name="priority"
                        value="{{ old('priority', isset($category) ? $category->priority : '') }}" placeholder="Nhập thứ tự của loại sản phẩm">
                    @error('priority')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="hidden" class="form-label">Sản phẩm ẩn hiện</label>
                    <select id="hidden" name="hidden" class="select2 form-select" fdprocessedid="mx0bgf">
                        @foreach ($hidden as $key => $h)
                            <option {{ $key == old('hidden', isset($category) ? $category->hidden : '') ? 'selected' : '' }}
                                value="{{ $key }}">
                                {{ ucfirst($h) }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2" fdprocessedid="bounwi">Lưu</button>
                {{-- <button type="reset" class="btn btn-outline-secondary" fdprocessedid="wrcwi8">Cancel</button> --}}
            </div>
        </form>
    </div>
@endsection

