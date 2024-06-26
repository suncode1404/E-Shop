@extends('client.layout')

@section('title', 'Đăng ký')

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
@endpush

@section('content')
    <section class=" p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <h4 class="text-center">Đăng ký</h4>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('account.process-register')}}" method="POST">
                                @csrf
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <x-form.field_input name='name'>
                                                User name
                                            </x-form.field_input>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <x-form.field_input name='email'>
                                                Email
                                            </x-form.field_input>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <x-form.field_input name='phone'>
                                                Phone
                                            </x-form.field_input>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <x-form.field_input name='password' type="password">
                                                Password
                                            </x-form.field_input>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <x-form.field_input name='password_confirmation' type="password">
                                                Confirm Password
                                            </x-form.field_input>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <x-form.field_input name='address' type="text">
                                                Address
                                            </x-form.field_input>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary py-3" type="submit">Đăng ký</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-center">
                                        <a href="{{ route('account.login') }}"
                                            class="link-secondary text-decoration-none">Đăng nhập ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
