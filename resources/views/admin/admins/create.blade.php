@extends('admin.layouts.app')
@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">افزودن مدیر جدید</h1>
        <div>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.admins.index')}}">مدیران</a></li>
                    <li class="breadcrumb-item active" aria-current="page">افزودن مدیر</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('admin.admins.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">ایجاد مدیر</div>
                        </div>

                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-xl-6">
                                    <label class="form-label">نام</label>
                                    <input type="text" class="form-control"
                                           name="first_name"
                                           value="{{ old('first_name') }}"
                                           placeholder="نام را وارد کنید">

                                    @error('first_name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-xl-6">
                                    <label class="form-label">نام خانوادگی</label>
                                    <input type="text"
                                           class="form-control"
                                           name="last_name"
                                           value="{{ old('last_name') }}"
                                           placeholder="نام خانوادگی را وارد کنید">
                                    @error('last_name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-xl-6">
                                    <label class="form-label">نام کاربری</label>
                                    <input type="text" class="form-control"
                                           name="username"
                                           value="{{ old('username') }}"
                                           placeholder="نام کاربری">
                                    @error('username')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-xl-6">
                                    <label class="form-label">ایمیل</label>
                                    <input type="email"
                                           class="form-control"
                                           name="email"
                                           value="{{ old('email') }}"
                                           placeholder="ایمیل را وارد کنید">
                                    @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-xl-6">
                                    <label class="form-label">رمز عبور</label>
                                    <input type="password"
                                           class="form-control"
                                           name="password"
                                           placeholder="رمز عبور را وارد کنید">
                                    @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-xl-6">
                                    <label class="form-label">وضعیت</label>

                                    <select class="form-control" name="status">

                                        <option value="{{ \App\Enums\AdminStatus::ENABLE->value }}"
                                            @selected(old('status', \App\Enums\AdminStatus::ENABLE->value) == \App\Enums\AdminStatus::ENABLE->value)>
                                            فعال
                                        </option>

                                        <option value="{{ \App\Enums\AdminStatus::DISABLE->value }}"
                                            @selected(old('status') == \App\Enums\AdminStatus::DISABLE->value)>
                                            غیرفعال
                                        </option>

                                    </select>

                                    @error('status')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-avatar">
                                <div class="text-center">
                                    <label class="form-label d-block fw-semibold">تصویر پروفایل</label>
                                    <label class="avatar-picker" id="avatarPreview"
                                           style="background-image: url('{{ asset('assets/admin/images/faces/DefaultAvatar.jpg') }}')">
                                        <input type="file" name="image" accept="image/*"
                                               onchange="previewAvatar(this)">
                                    </label>
                                    @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
