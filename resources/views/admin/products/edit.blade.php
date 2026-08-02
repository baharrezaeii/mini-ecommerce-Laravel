@extends('admin.layouts.app')
@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">ویرایش محصول</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">مدیریت محصولات</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش محصول</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid pt-4">

        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('admin.products.update',$product)}}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                ویرایش محصول
                            </div>
                        </div>

                        <div class="card-body pt-0">


                            <div class="row gy-3">
                                <!-- Name -->
                                <div class="col-xl-6">
                                    <label class="form-label">نام فارسی</label>
                                    <input
                                        type="text"
                                        class="form-control" name="name"
                                        placeholder="نام فارسی را وارد کنید"
                                        value="{{ old('name', $product->name) }}">

                                </div>
                                @error('name')
                                <span style="color: red"> {{$message}}</span>
                                @enderror

                                <!-- Name -->
                                <div class="col-xl-6">
                                    <label class="form-label">نام انگلیسی</label>
                                    <input type="text"
                                           class="form-control"
                                           name="en_name"
                                           placeholder="نام انگلیسی را وارد کنید"
                                           value= "{{ old('en_name',$product->en_name)}}">

                                </div>
                                @error('en_name')
                                <span style="color: red"> {{$message}}</span>
                                @enderror

                                <!-- Category -->
                                <div class="col-xl-6">
                                    <label class="form-label">دسته‌ بندی</label>
                                    <select class="form-control" name="product_category_id">
                                        <option value="">یک دسته بندی انتخاب کنید</option>

                                        @foreach($productCategories as $productCategory)
                                            <option
                                                value="{{ $productCategory->id }}"
                                                @selected(old('product_category_id', $product->product_category_id) == $productCategory->id)
                                            >
                                                {{ $productCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('product_category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Price -->
                                <div class="col-xl-6">
                                    <label class="form-label">قیمت</label>
                                    <input type="number"
                                           class="form-control"
                                           name="price"
                                           placeholder="قیمت را وارد کنید"
                                           value="{{ old('price', $product->price) }}">
                                </div>
                                    @error('price')
                                    <span style="color: red"> {{$message}}</span>
                                    @enderror

                                <!-- Discount Price -->
                                <div class="col-xl-6">
                                    <label class="form-label">تخفیف</label>
                                    <input type="number" class="form-control" name="discount"
                                           placeholder="تخفیف را وارد کنید"
                                           value="{{ old('discount', $product->discount) }}">
                                </div>

                                    @error('discount')
                                    <span style="color: red"> {{$message}}</span>
                                    @enderror

                                <!-- Stock -->
                                <div class="col-xl-6">
                                    <label class="form-label">موجودی</label>
                                    <input type="number"
                                           class="form-control"
                                           name="qty"
                                           placeholder="تعداد موجودی را وارد کنید"
                                           value="{{ old('qty', $product->qty) }}">
                                </div>
                                    @error('qty')
                                    <span style="color: red"> {{$message}}</span>
                                    @enderror

                                <!-- Description -->
                                <div class="col-xl-12">
                                    <label class="form-label">توضیحات</label>
                                    <textarea
                                        class="form-control"
                                        name="description"
                                        rows="4"
                                        placeholder="توضیحات را وارد کنید"
                                    >{{ old('description', $product->description) }}</textarea>

                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Product Images -->

                            <div
                                class="image-upload-wrapper d-flex flex-wrap gap-2 px-0 pt-0 mt-3"
                                id="imagePreviewContainer"
                                style="border-radius:8px;padding:10px;"
                            >

                                @foreach($product->productImages as $image)
                                    <div class="position-relative" style="width:150px;height:150px;">

                                        <img
                                            src="{{ asset('storage/'.$image->file->path) }}"
                                            class="w-100 h-100 rounded"
                                            style="object-fit: cover;">

                                        <button
                                            type="button"
                                            class="btn btn-sm btn-danger position-absolute top-0 end-0 delete-image"
                                            data-url="{{ route('admin.products.remove-image', [$product->id,$image->id]) }}">
                                            ×
                                        </button>

                                    </div>
                                @endforeach

                                <label
                                    id="uploadPlaceholder"
                                    class="upload-placeholder"
                                    for="imageInput"
                                    style="cursor:pointer;width:150px;height:150px;display:flex;justify-content:center;align-items:center;border:2px dashed #ccc;border-radius:8px;padding:20px;text-align:center;"
                                >
                                    <div>
                                        📷<br>
                                        <strong>آپلود یا کشیدن</strong>
                                        <br>
                                        <small style="color:#999;">JPG / PNG / JPEG / WEBP</small>
                                    </div>
                                </label>

                                <input
                                    id="imageInput"
                                    name="images[]"
                                    type="file"
                                    accept=".jpg,.png,.jpeg,.webp"
                                    multiple
                                    style="display:none">
                            </div>



                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">
                                ذخیره تغییرات
                            </button>
                        </div>
                        </div>
                        </div>
                </form>

            </div>
        </div>
    </div>

    @push('js')
        <script>
            $(document).on('click', '.delete-image', function () {

                let button = $(this);
                let url = button.data('url');

                if (!confirm('آیا از حذف این تصویر مطمئن هستید؟')) {
                    return;
                }

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE'
                    },

                    success: function () {
                        button.closest('.position-relative').remove();
                    },

                    error: function (xhr) {
                        console.log(xhr.responseText);
                        alert('خطا در حذف تصویر');
                    }
                });

            });
        </script>
    @endpush

@endsection



