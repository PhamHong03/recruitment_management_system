@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên đợt </th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Trạng thái</th>
                <th>Mô tả</th>
                <th>Cập nhật</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helper\Helper::hiring_round($hiring_rounds) !!}
        </tbody>
    </table>
@endsection