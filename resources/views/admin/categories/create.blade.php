@extends('admin.layouts.app')

@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">ایجاد دسته‌بندی جدید</h1>
        <div>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a
                            href="{{route('admin.categories.index')}}">دسته‌بندی‌ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ایجاد دسته‌بندی</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection


@section('content')
    <div class="container-fluid pt-4">

        <div class="row">
            <div class="col-xl-12">

                <!-- Create Category Form -->
                <form action="{{route('admin.categories.store')}}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card custom-card">

                        <div class="card-header">
                            <div class="card-title">ایجاد دسته‌بندی</div>
                        </div>
                    </div>
                        <div class="card-body">

                            <div class="row gy-3">
                                <div class="col-xl-6">
                                    <label class="form-label">نام دسته‌بندی</label>
                                    <input type="text" class="form-control"
                                           name="name"
                                           value="{{ old('name') }}"
                                           placeholder="نام دسته‌بندی را وارد کنید">
                                @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                                <div class="col-xl-12">
                                    <label class="form-label">توضیحات</label>
                                    <textarea class="form-control" name="description" rows="3"
                                              placeholder="توضیحات دسته‌بندی را وارد کنید">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                            <div class="card-avatar mt-3" style="min-height: unset">
                                <div class="text-center">
                                    <label class="form-label d-block mb-2 fw-semibold">تصویر دسته بندی</label>
                                    <label class="avatar-picker" id="avatarPreview"
                                           style="background-image: url('{{ asset('assets/admin/images/faces/DefaultAvatar.jpg') }}')" >
                                        <input type="file"
                                               name="images"
                                               accept="image/*"
                                               onchange="previewAvatar(this)">
                                    </label>
                                    @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">ایجاد دسته‌بندی</button>
                        </div>

                </form>

            </div>
        </div>

    </div>
@endsection
