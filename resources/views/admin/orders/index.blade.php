@extends('admin.layouts.app')

@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">لیست سفارشات</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.orders.index')}}">مدیریت سفارشات
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">لیست سفارشات</li>
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
                        <form method="GET" action="{{route('admin.orders.index')}}">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                <!-- Sort Dropdown -->
                                <div class="d-flex flex-wrap gap-1 align-items-center">
                                    <select id="choices-single-default" class="form-control" name="sort">
                                        <option value="">مرتب‌سازی بر اساس</option>
                                        <option
                                            value="created_at_desc"
                                            @selected(request()->missing('sort') || request()->input('sort') == 'created_at_desc')>
                                            جدیدترین
                                        </option>
                                        <option
                                            value="created_at_asc"
                                            @selected(request()->input('sort') == 'created_at_asc')>
                                            قدیمی‌ترین
                                        </option>
                                        <option
                                            value="price_high"
                                            @selected(request()->input('sort') == 'price_high')>
                                            مبلغ (زیاد به کم)
                                        </option>
                                        <option
                                            value="price_low"
                                            @selected(request()->input('sort') == 'price_low')>
                                            مبلغ (کم به زیاد)
                                        </option>
                                        <option value="status"
                                            @selected(request()->input('sort') == 'status')>
                                            وضعیت
                                        </option>
                                    </select>
                                </div>

                                <!-- Search -->
                                <div class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" name="search"
                                           placeholder="جستجو سفارش"
                                           value="{{request()->input('search')}}"
                                    >
                                    <button class="btn btn-light" type="submit">جستجو</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover">
                            <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>مشتری</th>
                                <th>مبلغ</th>
                                <th>وضعیت</th>
                                <th>تاریخ ثبت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div>
                                                <span class="fw-semibold d-block">#{{$order->id}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ getUserFullName($order->user) }}
                                    </td>
                                    <td>
                                        {{ number_format($order->total_price) }}
                                        تومان
                                    </td>
                                    <td>
                                        @switch($order->status)
                                            @case(\App\Enums\OrderStatus::PENDING)
                                                <span class="text-warning">در انتظار پرداخت</span>
                                                @break

                                            @case(\App\Enums\OrderStatus::PROCESSING)
                                                <span class="text-info">در حال پردازش</span>
                                                @break

                                            @case(\App\Enums\OrderStatus::SENT)
                                                <span class="text-primary">ارسال شده</span>
                                                @break

                                            @case(\App\Enums\OrderStatus::DELIVERED)
                                                <span class="text-success">تحویل داده شده</span>
                                                @break

                                            @case(\App\Enums\OrderStatus::CANCELLED)
                                                <span class="text-danger">لغو شده</span>
                                                @break

                                            @case(\App\Enums\OrderStatus::REFUND)
                                                <span class="text-secondary">مرجوع شده</span>
                                                @break
                                        @endswitch
                                    </td>

                                    <td>
                                        {{ $order->created_at->toJalali()->format('H:i Y-m-d') }}
                                    </td>

                                    <td>
                                        <div class="btn-list">
                                            <a href="{{route('admin.orders.show',$order->id)}}"
                                               class="btn btn-primary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a href="{{route('admin.orders.edit',$order->id)}}"
                                               class="btn btn-secondary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <a href="javascript:void(0);"
                                               onclick="if(confirm('آیا از حذف این سفارش مطمئن هستید؟')) { document.getElementById('delete-form-{{ $order->id }}').submit(); }"
                                               class="btn btn-pink-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                            <form id="delete-form-{{$order->id}}"
                                                  action="{{route('admin.orders.destroy',$order->id)}}"
                                                  method="POST"
                                                  style="display:none;"
                                            >
                                            @csrf
                                            @method('DELETE')
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
    </div>
@endsection
