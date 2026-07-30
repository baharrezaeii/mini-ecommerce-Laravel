@extends('admin.layouts.app')
@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">لیست محصولات</h1>

        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.products.index') }}">مدیریت محصولات</a></li>
                <li class="breadcrumb-item active" aria-current="page">لیست محصولات</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="container-fluid pt-4">

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body p-3">
                        <form method="GET" action="{{route('admin.products.index')}}">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                <div class="d-flex flex-wrap gap-1 project-list-main align-items-center">
                                    <div class="d-flex me-2">
                                        <input class="form-control me-2" type="search" name="search"
                                               placeholder="جستجو محصول"
                                               value="{{request()->input('search')}}"
                                               aria-label="جستجو">
                                        <button class="btn btn-light" type="submit">جستجو</button>
                                    </div>

                                    <select id="choices-single-default" class="form-control" name="sort">
                                        <option value="">مرتب‌سازی بر اساس</option>
                                        <option
                                            value="newest" @selected(request()->missing('sort') || request()->input('sort') == 'newest')>
                                            جدیدترین
                                        </option>
                                        <option
                                            value="name_asc" @selected(request()->missing('sort') || request()->input('sort') == 'newest')>
                                            نام (صعودی)
                                        </option>
                                        <option
                                            value="name_desc" @selected(request()->input('sort') == 'name_desc')>
                                            نام (نزولی)
                                        </option>
                                        <option
                                            value="price_asc" @selected(request()->input('sort') == 'price_asc')>
                                            قیمت (کم به زیاد)
                                        </option>
                                        <option
                                            value="price_desc" @selected(request()->input('sort') == 'price_desc')>
                                            قیمت (زیاد به کم)
                                        </option>
                                    </select>
                                </div>


                                <div class="d-flex">
                                    <a href="{{route('admin.products.create')}}" class="btn btn-primary me-2">
                                        <i class="ri-add-line me-1 fw-medium align-middle"></i>
                                        ایجاد محصول
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start::row-2 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                            <tr>
                                <th>نام</th>
                                <th>دسته‌ بندی</th>
                                <th>قیمت</th>
                                <th>تخفیف</th>
                                <th>موجودی</th>
                                <th>تاریخ ثبت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr class="product-list">
                                    <td>
                                        <div class="d-flex">
                                                <span class="avatar avatar-md avatar-square bg-light">
                                                        @if($product->defaultImage?->file)
                                                        <img
                                                            src="{{ asset('storage/' . $product->defaultImage->file->path) }}"
                                                            alt="{{ $product->name }}">
                                                    @else
                                                        <img
                                                            src="{{ asset('assets/images/default.jpg') }}"
                                                            alt="Default Image">
                                                    @endif
                                                </span>
                                            <div class="ms-2">
                                                <p class="fw-semibold mb-0 name-limit">
                                                    <a href="{{route('admin.products.show',$product)}}">
                                                        {{ $product->name }} | {{ $product->en_name }}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $product->productCategory->name }}</td>
                                    <td>
                                        {{ number_format($product->price) }}
                                        تومان
                                    </td>
                                    <td>
                                        {{ number_format($product->discount) }}
                                        تومان
                                    </td>
                                    <td>
                                        {{ $product->qty }}
                                    </td>
                                    <td>{{$product->created_at->toJalali()->format('H:i Y-m-d')}}</td>

                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="{{route('admin.products.show',$product)}}"
                                               class="btn btn-primary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a href="{{route('admin.products.edit',$product)}}"
                                               class="btn btn-secondary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <form action="{{route('admin.products.destroy',$product)}}"
                                                  method="POST"
                                                  style="display:inline;"
                                                  onsubmit="return confirm('آیا از حذف این محصول مطمئن هستید؟')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-icon btn-sm btn-danger-light">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- End::row-2 -->


    </div>
@endsection
