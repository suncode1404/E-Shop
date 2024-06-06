@extends('admin.layout')

@section('title', 'Form sản phẩm')
@push('css')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
@endpush
@section('content')
    @php
        $hot = ['bình thường', 'hot'];
        $hidden = ['Ẩn', 'hiện'];
    @endphp
    <a href="{{ route('admin.product.index') }}">Quay lại</a>
    <div class="card-body">
        <div class="fs-4 my-2">{{ $title }} người dùng </div>
        <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
            @csrf
            @method($method)
            <!-- Thẻ img để hiển thị ảnh xem trước ngay dưới input -->
            @if (isset($product) && $product->image)
                <img id="imagePreview" src="{{ asset('images/product/' . $product->image) }}" alt="Product Image"
                    style="max-width: 200px; display: block;">
            @else
                <img id="imagePreview" src="" alt="Product Image" style="max-width: 200px; display: none;">
            @endif
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="image" class="form-label">Ảnh</label>
                    <input type="file" class="form-control" id="image" name="image"
                        value="{{ old('image', isset($product) ? $product->image : '') }}" accept="image/png, image/jpeg">
                    <input type="hidden" name="image" value="{{ old('image', isset($product) ? $product->image : '') }}">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input class="form-control" type="text" id="name" name="name"
                        value="{{ old('name', isset($product) ? $product->name : '') }}" placeholder="Nhập tên sản phẩm">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="category_id" class="form-label">Loại sản phẩm</label>
                    <select id="category_id" name="category_id" class="select2 form-select">
                        @foreach ($categories as $ct)
                            <option
                                {{ $ct->id == old('category_id', isset($product) ? $product->category->id : '') ? 'selected' : '' }}
                                value="{{ $ct->id }}">
                                {{ ucfirst($ct->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="price" class="form-label">Giá sản phẩm</label>
                    <input class="form-control" type="text" id="price" name="price"
                        value="{{ old('price', isset($product) ? $product->price : '') }}" placeholder="Nhập giá sản phẩm">
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="quantity_available" class="form-label">Số lượng sản phẩm</label>
                    <input class="form-control" type="text" id="quantity_available" name="quantity_available"
                        value="{{ old('quantity_available', isset($product) ? $product->quantity_available : '') }}"
                        placeholder="Nhập số lượng sản phẩm">
                    @error('quantity_available')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="hot" class="form-label">Sản phẩm Hot</label>
                    <select id="hot" name="hot" class="select2 form-select" fdprocessedid="mx0bgf">
                        @foreach ($hot as $key => $h)
                            <option {{ $key == old('hot', isset($product) ? $product->hot : '') ? 'selected' : '' }}
                                value="{{ $key }}">
                                {{ ucfirst($h) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="hidden" class="form-label">Sản phẩm ẩn hiện</label>
                    <select id="hidden" name="hidden" class="select2 form-select" fdprocessedid="mx0bgf">
                        @foreach ($hidden as $key => $h)
                            <option
                                {{ $key == old('hidden', isset($product) ? $product->hiddencategory : '') ? 'selected' : '' }}
                                value="{{ $key }}">
                                {{ ucfirst($h) }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="heart" class="form-label">Số lượt tim</label>
                    <input class="form-control" type="text" id="heart" name="heart"
                        value="{{ old('heart', isset($product) ? $product->heart : '') }}" placeholder="Nhập số lượt tim">
                    @error('heart')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="view" class="form-label">Số lượt xem</label>
                    <input class="form-control" type="text" id="view" name="view"
                        value="{{ old('view', isset($product) ? $product->view : '') }}" placeholder="Nhập số lượt xem">
                    @error('view')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="short_description" class="form-label">Mô tả ngắn</label>
                    <textarea class="form-control shadow-none fs-5" name="short_description" id="short_description" rows="2">{{ old('short_description', isset($product) ? $product->short_description : '') }}</textarea>
                    @error('short_description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-12">
                    <label for="editor" class="form-label">Mô tả sản phẩm</label>
                    <textarea name="description" id="editor">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2" fdprocessedid="bounwi">Lưu</button>
                {{-- <button type="reset" class="btn btn-outline-secondary" fdprocessedid="wrcwi8">Cancel</button> --}}
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                }
            })
            .catch((error) => {
                console.error(error);
            })
        document.addEventListener("DOMContentLoaded", function() {
            const imageInput = document.querySelector('#image');
            const imagePreview = document.querySelector('#imagePreview');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.style.display = 'none';
                    imagePreview.src = '';
                }
            });
        });
    </script>
@endpush
