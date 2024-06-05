@extends('admin.layout')

@section('title', 'User Form')

@section('content')
    @php
        $role = ['user', 'admin'];
        $status = ['active', 'inactive'];
    @endphp
    <a href="{{ route('admin.user.index') }}">Quay lại</a>
    <div class="card-body">
        <div class="fs-4 my-2">{{$title}} người dùng </div>
        <form method="POST" action="{{ $route }}">
            @csrf
            @method($method)
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" type="text" id="name" name="name"
                        value="{{ old('name', isset($user) ? $user->name : '') }}" placeholder="Nhập tên user">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="text" id="password" name="password" value="{{ old('password') }}"
                        placeholder="Nhập mật khẩu">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="password_confirmation" class="form-label"> Confirm Password</label>
                    <input class="form-control" type="text" id="password_confirmation" name="password_confirmation"
                        value="{{ old('password_confirmation') }}" placeholder="Nhập mật khẩu">
                    @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="text" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email"
                        value="{{ old('email', isset($user) ? $user->email : '') }}" placeholder="Nhập email">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="phone">Số điện thoại</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">VN (+84)</span>
                        <input type="text" id="phone" name="phone"
                            value="{{ old('phone', isset($user) ? $user->phone : '') }}" class="form-control"
                            placeholder="202 555 0111">
                    </div>
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="{{ old('address', isset($user) ? $user->address : '') }}" placeholder="Address">
                    @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="role" class="form-label">Vai trò</label>
                    <select id="role" name="role" class="select2 form-select" fdprocessedid="mx0bgf">
                        @foreach ($role as $rl)
                            <option {{ $rl == old('role', isset($user) ? $user->role : '') ? 'selected' : '' }}
                                value="{{ $rl }}">
                                {{ ucfirst($rl) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="select2 form-select" fdprocessedid="mx0bgf">
                        @foreach ($status as $st)
                            <option {{ $st == old('status', isset($user) ? $user->status : '') ? 'selected' : '' }}
                                value="{{ $st }}">
                                {{ ucfirst($st) }}</option>
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
