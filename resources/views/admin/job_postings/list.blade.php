@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Yêu cầu</th>
                <th>Nội dung</th>
                <th>Mức lương</th>
                <th>Ngày BD</th>
                <th>Ngày KT</th>
                <th>Poster</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helper\Helper::job_posting($job_postings) !!}
        </tbody>
    </table>
    {!! $job_postings->links() !!}
@endsection