@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Vị trí </th>
                <th>Yêu cầu</th>
                <th>Mô tả</th>
                <th>Chi nhánh </th>
                <th>Đợt ứng tuyển</th>
                <th>Cập nhật</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helper\Helper::open_position($open_positions) !!}
        </tbody>
    </table>
    {!! $open_positions->links() !!}
@endsection