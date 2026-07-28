@extends('admin.layouts.app')

@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">جزئیات محصول</h1>
        <div>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">محصولات</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">جزئیات محصول</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid pt-4">

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">

                        <!-- Product Images -->
                        <div class="image-upload-wrapper d-flex flex-wrap gap-2 mb-4"
                             style="border-radius: 8px; padding: 10px;">
                            <div style="width:150px;height:150px;">
                                <img
                                    src="{{ asset('storage/' . ($product->defaultImage?->file?->path ?? 'assets/images/default.jpg')) }}"
                                    style="width:100%;height:100%;object-fit:cover;"
                                    alt="{{ $product->name }}"
                                >
                            </div>
                        </div>

                        <div class="row gy-3">
                            <div class="col-xl-6">
                                <strong>نام محصول:</strong>
                                <p>{{ $product->name }}</p>
                            </div>

                            <div class="col-xl-6">
                                <strong>نام انگلیسی:</strong>
                                <p>{{ $product->en_name }}</p>
                            </div>

                            <div class="col-xl-6">
                                <strong>دسته‌بندی:</strong>
                                <p>{{ $product->productCategory->name }}</p>
                            </div>

                            <div class="col-xl-6">
                                <strong>قیمت:</strong>
                                <p>{{ number_format($product->price) }} تومان</p>
                            </div>

                            <div class="col-xl-6">
                                <strong>قیمت تخفیفی:</strong>
                                <p>{{ number_format($product->discount) }} تومان</p>
                            </div>

                            <div class="col-xl-6">
                                <strong>موجودی:</strong>
                                <p>{{ $product->qty }}</p>
                            </div>

                            <div class="col-xl-6">
                                <strong>وضعیت:</strong>
                                <p>
                                    @switch($product->status)

                                        @case(\App\Enums\ProductStatus::DISABLE)
                                            <span class="badge bg-danger">غیرفعال</span>
                                            @break

                                        @case(\App\Enums\ProductStatus::DRAFT)
                                            <span class="badge bg-warning">پیش‌نویس</span>
                                            @break

                                        @case(\App\Enums\ProductStatus::PUBLISHED)
                                            <span class="badge bg-success">منتشر شده</span>
                                            @break

                                    @endswitch
                                </p>
                            </div>

                            <div class="col-xl-12">
                                <strong>توضیحات:</strong>
                                <p>
                                    {{ $product->description }}
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-end">
                        <a href="{{route('admin.products.index')}}" class="btn btn-secondary">
                            بازگشت به لیست محصولات
                        </a>
                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="btn btn-warning ms-2">
                            ویرایش
                            محصول
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
