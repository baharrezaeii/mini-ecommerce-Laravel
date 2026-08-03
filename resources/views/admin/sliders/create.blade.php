@extends('admin.layouts.app')
@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">اسلایدر</h1>
        <div>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.sliders.create') }}">اسلایدرها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">نمایش اسلایدرها</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid pt-4">

        <div class="row">
            <div class="col-xl-12">

                <form action="{{ route('admin.sliders.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="card custom-card">

                        <div class="card-header">
                            <div class="card-title">
                                افزودن اسلایدر
                            </div>
                        </div>


                        <div class="card-body">

                            <div class="row gy-3">


                                {{-- Title --}}
                                <div class="col-xl-6">

                                    <label class="form-label">
                                        عنوان اسلایدر
                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           name="title"
                                           value="{{ old('title') }}"
                                           placeholder="عنوان را وارد کنید">


                                    @error('title')
                                    <span class="text-danger">
                                    {{ $message }}
                                </span>
                                    @enderror

                                </div>

                                {{-- Sort --}}
                                <div class="col-xl-6">

                                    <label class="form-label">
                                        ترتیب نمایش
                                    </label>

                                    <input type="number"
                                           class="form-control"
                                           name="sort"
                                           min="1"
                                           value="{{ old('sort', 1) }}"
                                           placeholder="ترتیب نمایش را وارد کنید">

                                    @error('sort')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror

                                </div>

                                <div class="col-xl-6">

                                    <label class="form-label">
                                        تصویر اسلایدر
                                    </label>
                                    <div
                                        class="image-upload-wrapper d-flex flex-wrap gap-2 px-0 pt-0 mt-3"
                                        id="imagePreviewContainer"
                                        style=" border-radius: 8px; padding: 10px;"
                                    >
                                        <label
                                            id="uploadPlaceholder"
                                            class="upload-placeholder"
                                            for="imageInput"
                                            style="cursor: pointer; width:150px; height:150px; display: flex; justify-content: center; align-items: center; border: 2px dashed #ccc; border-radius: 8px; padding: 20px; text-align: center;"
                                        >
                                            <div>📷<br><strong>آپلود یا کشیدن</strong></div>
                                            <small style="color:#999;">JPG / PNG / JPEG / WEBP/JFIF</small>
                                        </label>
                                        <input
                                            id="imageInput"
                                            type="file"
                                            name="image"
                                            accept=".jpg,.png,.jpeg,.webp"
                                            class="form-control"
                                            style="display:none"
                                        />
                                    </div>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">افزودن اسلایدر</button>
                        </div>


                    </div>


                </form>
            </div>

        </div>

    </div>
@endsection

