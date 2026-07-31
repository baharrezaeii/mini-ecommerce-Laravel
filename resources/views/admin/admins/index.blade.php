@extends('admin.layouts.app')
@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">لیست ادمین‌ها</h1>
        <div>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}">ادمین‌ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">لیست ادمین‌ها</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid pt-4">

        <!-- Filter + Search -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body p-3">
                        <form method="GET"
                              action="{{route('admin.admins.index')}}">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                <!-- Left: Add Admin + Sort -->
                                <div class="d-flex flex-wrap gap-1 project-list-main align-items-center">
                                    <div class="d-flex me-2">
                                        <input class="form-control me-2" type="search" name="search"
                                               placeholder="جستجو ادمین"
                                               value="{{ request('search') }}"
                                               aria-label="جستجو">
                                        <button class="btn btn-light" type="submit">جستجو</button>
                                    </div>

                                    <select id="choices-single-default" class="form-control" name="sort">
                                        <option value="">مرتب‌سازی بر اساس</option>
                                        <option
                                            value="name_asc"
                                            @selected(request('sort') == 'name_asc')>
                                            نام (الف - ی)
                                        </option>
                                        <option
                                            value="name_desc"
                                            @selected(request('sort') == 'name_desc')>
                                            نام (ی - الف)
                                        </option>
                                        <option value="email"
                                            @selected(request('sort') == 'email')>
                                            ایمیل
                                        </option>
                                        <option value="newest"
                                            @selected(request()->missing('sort') || request('sort') == 'newest')>
                                            جدیدترین
                                        </option>
                                    </select>
                                </div>

                                <!-- Right: Search -->
                                <div class="d-flex" role="search">
                                    <a href="{{route('admin.admins.create')}}"
                                       class="btn btn-primary me-2">
                                        <i class="ri-add-line me-1 fw-medium align-middle"></i>ایجاد مدیر
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                            <tr>
                                <th><input class="form-check-input check-all" type="checkbox" id="all-admins"></th>
                                <th>تصویر</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>نام کاربری</th>
                                <th>ایمیل</th>
                                <th>وضعیت</th>
                                <th>تاریخ ایجاد</th>
                                <th>اقدامات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>
                                        <input class="form-check-input"
                                               type="checkbox"
                                               value="{{ $admin->id }}">
                                    </td>
                                    <td>
                   <span class="avatar avatar-md avatar-square bg-light">
                          <img
                         src="{{ $admin->file
                           ? asset('storage/'.$admin->file->path)
                           : asset('assets/admin/images/faces/DefaultAvatar.jpg') }}"
                          class="w-100 h-100"
                              alt="{{ $admin->first_name }}">
                                          </span>
                                    </td>
                                    <td>{{ $admin->first_name }}</td>
                                    <td>{{ $admin->last_name }}</td>
                                    <td>{{ $admin->username }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        @switch($admin->status)

                                            @case(\App\Enums\AdminStatus::ENABLE)
                                                <span class="badge bg-primary-transparent">فعال</span>
                                                @break

                                            @case(\App\Enums\AdminStatus::DISABLE)
                                                <span class="badge bg-danger-transparent">غیرفعال</span>
                                                @break

                                        @endswitch
                                    </td>

                                    <td>{{ $admin->created_at->toJalali()->format('H:i Y/m/d') }}</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="{{ route('admin.admins.edit', $admin) }}"
                                               class="btn btn-secondary-light btn-icon btn-sm" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.admins.destroy', $admin) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('آیا از حذف این ادمین مطمئن هستید؟')">
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
            {{ $admins->links() }}
        </div>
@endsection
