@extends('admin.layouts.app')
@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">
            جزئیات سفارش #{{ $order->id }}
        </h1>

        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.orders.index')}}">
                        مدیریت سفارشات
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> جزئیات سفارش #{{ $order->id }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="container-fluid pt-4">

        <!-- Main Row -->
        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Summary -->
                        <div class="card custom-card overflow-hidden" style="padding-bottom: 6px !important;">
                            <div class="card-header justify-content-between">
                                <div class="card-title">خلاصه سفارش</div>
                                <div>شناسه: <span class="text-primary fw-semibold">{{ $order->id }}</span></div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="fw-semibold">تعداد کالا:</div>
                                        </td>
                                        <td>{{ $order->total_products }}</td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="fw-semibold">وضعیت سفارش:</div>
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
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="fw-semibold">مبلغ کل:</div>
                                        </td>
                                        <td>
                                                <span class="fw-medium">
                                                   {{ number_format($order->total_price) }}
                                                    تومان
                                                </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom: 0;">
                                            <div class="fw-semibold">توضیحات:</div>
                                        </td>
                                        <td style="border-bottom: 0;">
                                            {{ $order->description ?: '-' }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Address Info -->
                    <div class="col-md-6">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">آدرس تحویل</div>
                            </div>
                            <div class="card-body">
                                <p>
                                    <strong>آدرس:</strong>
                                    {{ $order->user_province }}
                                    -
                                    {{ $order->user_city }}
                                    -
                                    {{ $order->user_address }}
                                </p>
                                <p>
                                    <strong>شماره تماس:</strong>
                                    {{ $order->user_mobile }}
                                </p>
                                <p>
                                    <strong>کد پستی:</strong>
                                    {{ $order->user_postal_code }}
                                </p>
                                <p>
                                    <strong>کد پیگیری:</strong>
                                    {{ $order->tracking_code }}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-xl-4">

                <!-- User Info -->
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">مشخصات کاربر</div>
                    </div>
                    <div class="card-body">
                        <p><strong>نام:</strong>{{ getUserFullName($order->user) }}</p>
                        <p><strong>ایمیل:</strong> {{ $order->user->email }}</p>
                        <p><strong>موبایل:</strong>{{ $order->user->mobile }}</p>

                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-3">
    <div class="col-12">
        <!-- Order Card -->
            <div class="card custom-card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">
                        محصولات سفارش
                    </div>

                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th scope="col">محصول</th>
                                <th scope="col">قیمت</th>
                                <th scope="col">تعداد</th>
                                <th scope="col">مبلغ نهایی</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderItems as $orderItem)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <div class="mb-1 fs-14 fw-medium">
                                                        <span>
                                                          {{ $orderItem->product->name }}
                                                          |
                                                            {{ $orderItem->product->productCategory->name }}
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ number_format($orderItem->unit_price) }}
                                        تومان
                                    </td>
                                    <td> {{ $orderItem->qty }}</td>
                                    <td>
                                        {{ number_format($orderItem->total_price) }}
                                        تومان
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
    </div>

@endsection
