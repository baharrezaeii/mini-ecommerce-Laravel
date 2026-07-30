@extends('admin.layouts.app')
@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">لیست دسته‌بندی‌ها</h1>
        <div>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.categories.index')}}">دسته‌بندی‌ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">لیست دسته‌بندی‌ها</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid pt-4">

        <!-- Filters -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body p-3">
                        <form method="GET"
                              action="{{route('admin.categories.index')}}">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                <!-- Sort Dropdown -->
                                <div class="d-flex flex-wrap gap-1 align-items-center">
                                    <div class="d-flex me-2">
                                        <input class="form-control me-2"
                                               type="search"
                                               name="search"
                                               placeholder="جستجو دسته‌بندی"
                                               value="{{ request('search') }}">
                                        <button class="btn btn-light" type="submit">جستجو</button>
                                    </div>

                                    <select id="choices-single-default" class="form-control" name="sort">
                                        <option value="">مرتب‌سازی بر اساس</option>
                                        <option value="date_desc" @selected(request('sort')=='date_desc')>جدیدترین
                                        </option>
                                        <option value="date_asc" @selected(request('sort')=='date_asc')>قدیمی‌ترین
                                        </option>
                                        <option value="name_asc" @selected(request('sort')=='name_asc')>نام (الف تا ی)
                                        </option>
                                        <option value="name_desc" @selected(request('sort')=='name_desc')>نام (ی تا
                                            الف)
                                        </option>
                                    </select>
                                </div>

                                <!-- Search -->
                                <div class="d-flex" role="search">
                                    <a href="{{route('admin.categories.create')}}"
                                       class="btn btn-primary me-2">
                                        <i class="ri-add-line me-1 fw-medium align-middle"></i>
                                        ایجاد دسته بندی
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Table -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                            <tr>
                                <th>دسته‌بندی</th>
                                <th>توضیحات</th>
                                <th>تعداد محصولات</th>
                                <th scope="col">وضعیت</th>
                                <th>تاریخ ایجاد</th>
                                <th>اقدامات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                        <span class="avatar avatar-md avatar-square bg-light">
                                         <img
                                             src="{{ $category->file ?asset('storage/'.$category->file->path): asset('assets/admin/images/product-default-image.png') }}"
                                             class="w-100 h-100"
                                             alt="{{ $category->name }}">

                                        </span>
                                            <div class="ms-2">
                                                <p class="fw-semibold mb-0 name-limit">
                                                    <a href="{{ route('admin.categories.show',$category) }}">{{$category->name}}</a>
                                                </p>
                                                <p class="fs-12 text-muted mb-0 ">#{{ $category->id }}#</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="description-limit">{{ $category->description }}</td>
                                    <td>{{ $category->products_count }}</td>
                                    <td>
                                        @switch($category->status)
                                            @case(\App\Enums\CategoryStatus::ENABLED)
                                                <span class="badge bg-success-transparent">
                                            فعال
                                        </span>
                                                @break
                                            @case(\App\Enums\CategoryStatus::DISABLED)
                                                <span class="badge bg-danger-transparent">
                                                    غیرفعال
                                                </span>
                                                @break
                                        @endswitch

                                    </td>
                                    <td>{{ $category->created_at->toJalali()->format('Y/m/d H:i') }}</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="{{ route('admin.categories.show',$category) }}"
                                               class="btn btn-primary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a href="{{ route('admin.categories.edit',$category) }}"
                                               class="btn btn-secondary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.categories.destroy',$category) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('آیا از حذف این دسته‌بندی مطمئن هستید؟')">
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


        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            {{ $categories->links() }}
        </div>
@endsection
