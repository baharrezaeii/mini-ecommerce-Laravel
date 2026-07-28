@extends('admin.layouts.app')

@section('breadcrumb')
    <!-- Start::header-element -->
    <div class="header-element header-search d-md-block d-none my-auto">
        <div>
            <div>
                <h1 class="page-title fw-medium fs-18 mb-2">
                    جزئیات کاربر
                    {{getUserFullName($user)}}
                </h1>
                <div class="">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.users.index')}}">مدیریت کاربران</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.users.index')}}">لیست کاربران</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                جزئیات کاربر
                                {{getUserFullName($user)}}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End::header-element -->
@endsection

@section('content')
    <div class="container-fluid pt-4">

        <!-- User Info Card -->
        <div class="card custom-card mb-4">
            <div class="card-header">
                <div class="card-title">اطلاعات کاربر</div>
            </div>

            <div class="d-flex align-items-center p-3 pt-0">
                <div class="card-body flex-grow-1">
                    <dl class="row mb-0">
                        <dt class="col-sm-3 my-2 fw-semibold">نام کامل:</dt>
                        <dd class="col-sm-9 my-2">{{getUserFullName($user)}}</dd>

                        <dt class="col-sm-3 my-2 fw-semibold">ایمیل:</dt>
                        <dd class="col-sm-9 my-2">{{$user->email}}</dd>

                        <dt class="col-sm-3 my-2 fw-semibold">شماره تلفن:</dt>
                        <dd class="col-sm-9 my-2">{{$user->mobile}}</dd>

                        <dt class="col-sm-3 my-2 fw-semibold">تاریخ ثبت‌نام:</dt>
                        <dd class="col-sm-9 my-2">{{$user->created_at->toJalali()->format('H:i Y-m-d')}}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card mb-4">
                    <div class="card-header">
                        <div class="card-title">سفارشات اخیر کاربر</div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover">
                            <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>مبلغ</th>
                                <th>وضعیت</th>
                                <th>تاریخ ثبت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $user->orders as $order)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div>
                                            <span class="fw-semibold d-block">#{{$order->id}}</span>
                                        </div>
                                    </div>
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
                                        <a href="{{route('admin.orders.show',$order)}}"
                                           class="btn btn-primary-light btn-icon btn-sm"
                                           data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                        <a href="{{route('admin.orders.edit',$order)}}"
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
                                        <form id="delete-form-{{ $order->id }}"
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
