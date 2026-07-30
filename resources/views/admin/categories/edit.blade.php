@extends('admin.layouts.app')
@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">ویرایش دسته‌بندی</h1>
        <div>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a
                            href="{{route('admin.categories.index')}}">دسته‌بندی‌ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش دسته‌بندی</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid pt-4">


        <div class="row">
            <div class="col-xl-12">

                <!-- Edit Category Form -->
                <form action="{{ route('admin.categories.update', $category) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">ویرایش دسته‌بندی</div>
                        </div>

                        <div class="card-body">

                            <div class="row gy-3">
                                <div class="col-xl-6">
                                    <label class="form-label">نام دسته‌بندی</label>
                                    <input type="text" class="form-control" name="name"
                                           value="{{ old('name', $category->name) }}"
                                           placeholder="نام دسته‌بندی را وارد کنید">
                                    @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-xl-12">
                                    <label class="form-label">توضیحات</label>
                                    <textarea class="form-control" name="description" rows="3"
                                              placeholder="توضیحات دسته‌بندی را وارد کنید">
                                        {{ old('description', $category->description) }}</textarea>
                                    @error('description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-avatar mt-3" style="min-height: unset">
                                <!-- Avatar Picker -->
                                <div class="text-center">
                                    <label class="form-label d-block fw-semibold">تصویر دسته بندی</label>
                                    <label class="avatar-picker" id="avatarPreview"
                                           style="background-image: url('{{ $category->file?->path ? asset('storage/'.$category->file->path) : asset('assets/admin/images/faces/DefaultAvatar.jpg') }}')">
                                        <input type="file"
                                               name="image"
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
                            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                        </div>
                    </div>
                </form>
            </div>

            </div>
        </div>


@endsection
