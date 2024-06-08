@extends('client.form.info_user')
@section('title', 'Thông tin Tài khoản')
@section('info_content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-update">
                <h4>Cập Nhật Thông Tin Cá Nhân</h4>
                <form action="{{ route('client.user.info.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Nhập tên của bạn" value="{{ old('name', isset($user) ? $user->name : '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Nhập email của bạn" value="{{ old('email', isset($user) ? $user->email : '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số Điện Thoại</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                            placeholder="Nhập số điện thoại của bạn"
                            value="{{ old('phone', isset($user) ? $user->phone : '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa Chỉ</label>
                        {{-- <input type="text" class="form-control" name="address" id="address"
                        placeholder="Nhập địa chỉ của bạn"  value=""> --}}
                        <textarea name="address" id="address" cols="30" rows="4">{{ old('address', isset($user) ? $user->address : '') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
