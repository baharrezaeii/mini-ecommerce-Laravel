@extends('admin.layouts.app')
@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">ویرایش سفارش</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.orders.index')}}">مدیریت سفارشات</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش سفارش</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid pt-4">


        <!-- Edit Form -->
        <div class="card custom-card">
            <div class="card-body">


                <form action="{{route('admin.orders.update',$order)}}"
                      method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label fw-semibold">وضعیت سفارش</label>

                        <select name="status" class="form-select">

                            <option value="{{ \App\Enums\OrderStatus::PENDING->value }}"
                                @selected($order->status == \App\Enums\OrderStatus::PENDING)>
                                در انتظار پرداخت
                            </option>

                            <option value="{{ \App\Enums\OrderStatus::PROCESSING->value }}"
                                @selected($order->status == \App\Enums\OrderStatus::PROCESSING)>
                                در حال پردازش
                            </option>

                            <option value="{{ \App\Enums\OrderStatus::SENT->value }}"
                                @selected($order->status == \App\Enums\OrderStatus::SENT)>
                                ارسال شده
                            </option>

                            <option value="{{ \App\Enums\OrderStatus::DELIVERED->value }}"
                                @selected($order->status == \App\Enums\OrderStatus::DELIVERED)>
                                تحویل داده شده
                            </option>

                            <option value="{{ \App\Enums\OrderStatus::CANCELLED->value }}"
                                @selected($order->status == \App\Enums\OrderStatus::CANCELLED)>
                                لغو شده
                            </option>

                            <option value="{{ \App\Enums\OrderStatus::REFUND->value }}"
                                @selected($order->status == \App\Enums\OrderStatus::REFUND)>
                                مرجوع شده
                            </option>

                        </select>
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-wave">
                        ذخیره تغییرات
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
