@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid pt-4">

        <table class="table table-bordered">

            <thead>
            <tr>
                <th>تصویر</th>
                <th>عنوان</th>
                <th>وضعیت</th>
            </tr>
            </thead>


            <tbody>

            @foreach($sliders as $slider)

                <tr>

                    <td>
                        <img
                            src="{{ getFileUrl($slider->image_id) }}"
                            width="150"
                            height="80">
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


                </tr>

            @endforeach


            </tbody>

        </table>

    </div>
@endsection
