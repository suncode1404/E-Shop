@extends('client.form.info_user')
@section('title', 'Đổi Mật Khẩu')
@section('info_content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-update">
                <h4>Đổi Mật Khẩu</h4>
                <form action="{{ route('client.user.resetPassword.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control" name="password" id="password"
                            placeholder="Nhập mật khẩu mới" value="{{ old('password') }}">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                        <input type="text" class="form-control" name="password_confirmation" id="password_confirmation"
                            placeholder="Nhập lại mật khẩu" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
