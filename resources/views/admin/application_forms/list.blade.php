@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Email</th>
                <th>Vị trí </th>
                <th>CV</th>
                <th>Ngày nộp</th>
                <th>Cập nhật</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helper\Helper::applicationform($applicationforms) !!}
        </tbody>
    </table>
@endsection