@extends('admin.layouts.app')
@section('breadcrumb')
    <div>
        <h1 class="page-title fw-medium fs-18 mb-2">اسلایدر</h1>
        <div>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">اسلایدرها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">نمایش اسلایدرها</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')

    <div class="container-fluid pt-4">
        <div class="card custom-card">

            <div class="card-header d-flex justify-content-between align-items-center">

                <div class="card-title">
                    مدیریت اسلایدر
                </div>

                <a href="{{ route('admin.sliders.create') }}"
                   class="btn btn-primary">
                    افزودن اسلایدر
                </a>

            </div>
        <table class="table table-bordered">

            <thead>
            <tr>
                <th>تصویر</th>
                <th>عنوان</th>
                <th>وضعیت</th>
                <th>ترتیب نمایش</th>
            </tr>
            </thead>


            <tbody>

            @foreach($sliders as $slider)

                <tr>

                    <td>
                        <img
                            src="{{ getFileUrl($slider->image_id) }}"
                            width="150"
                            height="80"
                            alt="{{ $slider->title }}">
                        >
                    </td>


                    <td>
                        {{ $slider->title }}
                    </td>


                    <td>

                        @if($slider->status)
                            <span class="badge bg-success">
        فعال
    </span>
                        @else
                            <span class="badge bg-danger">
        غیرفعال
    </span>
                        @endif

                    </td>

                    <td>
                        {{ $slider->sort }}
                    </td>
                </tr>

            @endforeach


            </tbody>

        </table>

    </div>
@endsection
