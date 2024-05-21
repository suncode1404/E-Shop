@props([
    'title' => '',
    'id' => '',
])
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ route('client.home') }}">Trang chủ<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{ route(Route::currentRouteName(),$id) }}">{{ $title }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
