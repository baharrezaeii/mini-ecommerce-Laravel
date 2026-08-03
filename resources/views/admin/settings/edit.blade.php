@extends('admin.layouts.app')
@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">ویرایش تنظیمات</h1>
        <div class="">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.settings.edit')}}">مدیریت محصولات</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش تنظیمات</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid pt-4">

        <div class="row">
            <div class="col-xl-12">

                <form
                    action="{{ route('admin.settings.update') }}"
                    method="POST"
                >
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>شماره تماس</label>
                        <input
                            type="text"
                            name="phone"
                            value="{{ $settings['phone'] ?? '' }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>ایمیل</label>
                        <input
                            type="text"
                            name="email"
                            value="{{ $settings['email'] ?? '' }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>آدرس</label>
                        <textarea
                            name="address"
                            class="form-control">{{ $settings['address'] ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>اینستاگرام</label>
                        <input
                            type="text"
                            name="instagram"
                            value="{{ $settings['instagram'] ?? '' }}"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>لینکدین</label>
                        <input
                            type="text"
                            name="linkedin"
                            value="{{ $settings['linkedin'] ?? '' }}"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>یوتیوب</label>
                        <input
                            type="text"
                            name="youtube"
                            value="{{ $settings['youtube'] ?? '' }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>واتساب</label>
                        <input
                            type="text"
                            name="whatsapp"
                            value="{{ $settings['whatsapp'] ?? '' }}"
                            class="form-control">
                    </div>

                    <button class="btn btn-primary">
                        ذخیره تغییرات
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
