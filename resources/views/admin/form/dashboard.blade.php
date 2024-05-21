@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <!-- Welcom -->
    <div class="d-flex flex-wrap justify-content-between">
        <div class="d-flex flex-wrap justify-content-around shadow p-3 mb-5 bg-body rounded flex-fill align-items-center">
            <div class="content">
                <div class="title fs-4 fw-medium">Chào mừng,Tính 🎉</div>
                <div class="description fs-5 px-2">
                    Hãy cùng làm việc .....
                </div>
            </div>
            <div class="img_manLaptop">
                <img src="{{ asset('images/dashboard.png') }}" class="img-fluid manLatop" alt="">
            </div>
        </div>
        <div class="d-flex flex-column gap-1 flex-fill mx-4">


            <div class="d-flex gap-4">
                <div class="shadow p-3 mb-5 bg-body rounded flex-fill d-flex flex-column align-items-center">
                    <div class="d-flex">
                        <i class="bi bi-person-gear bg-primary-subtle p-2 px-3 fs-5 mx-2 rounded"></i>
                    </div>
                    <div class="title_employee fw-medium py-2">Nhân viên</div>
                    <div class="quanti fs-4">$12,0000</div>
                </div>
                <div class="shadow p-3 mb-5 bg-body rounded flex-fill d-flex flex-column align-items-center">
                    <div class="d-flex">
                        <i class="bi bi-person-gear bg-primary-subtle p-2 px-3 fs-5 mx-2 rounded"></i>
                    </div>
                    <div class="title_employee fw-medium py-2">Nhân viên</div>
                    <div class="quanti fs-4">$12,0000</div>
                </div>
            </div>

            <div class="d-flex gap-4">
                <div class="shadow p-3 mb-5 bg-body rounded flex-fill d-flex flex-column align-items-center">
                    <div class="d-flex">
                        <i class="bi bi-person-gear bg-primary-subtle p-2 px-3 fs-5 mx-2 rounded"></i>
                    </div>
                    <div class="title_employee fw-medium py-2">Nhân viên</div>
                    <div class="quanti fs-4">$12,0000</div>
                </div>
                <div class="shadow p-3 mb-5 bg-body rounded flex-fill d-flex flex-column align-items-center">
                    <div class="d-flex">
                        <i class="bi bi-person-gear bg-primary-subtle p-2 px-3 fs-5 mx-2 rounded"></i>
                    </div>
                    <div class="title_employee fw-medium py-2">Nhân viên</div>
                    <div class="quanti fs-4">$12,0000</div>
                </div>
            </div>
        </div>


    </div>
    <!-- Biểu đồ -->
    <div id="chart"></div>
    <!-- Bill -->
    <div class="bill">
        <div class="fw-medium fs-3">Đơn hàng</div>
        <div class="body-bill shadow p-3 mb-5 bg-body-tertiary rounded table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col-1">Mã đơn hàng</th>
                        <th scope="col">Tên người đặt</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical " type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li class="d-flex align-items-center mx-2">
                                        <i class="bi bi-pencil"></i>
                                        <a class="dropdown-item" href="#">Edit</a>
                                    </li>
                                    <li class="d-flex align-items-center mx-2">
                                        <i class="bi bi-trash"></i>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@mdo</td>
                        <td>
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical " type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li class="d-flex align-items-center mx-2">
                                        <i class="bi bi-pencil"></i>
                                        <a class="dropdown-item" href="#">Edit</a>
                                    </li>
                                    <li class="d-flex align-items-center mx-2">
                                        <i class="bi bi-trash"></i>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@mdo</td>
                        <td>
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical " type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li class="d-flex align-items-center mx-2">
                                        <i class="bi bi-pencil"></i>
                                        <a class="dropdown-item" href="#">Edit</a>
                                    </li>
                                    <li class="d-flex align-items-center mx-2">
                                        <i class="bi bi-trash"></i>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
