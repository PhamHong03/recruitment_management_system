{{-- @extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Email</th>
                <th>Vị trí </th>
                <th>CV</th>
                <th>Ngày nộp</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helper\Helper::applicationform($applicationforms) !!}
        </tbody>
    </table>
@endsection --}}

@extends('admin.main')
@section('content')
    <div class="container">
        {{-- <h2>Danh sách đơn ứng tuyển</h2> --}}

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Vị trí</th>
                    <th>CV</th>
                    <th>Ngày nộp</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicationforms as $applicationform)
                    <tr>
                        <td>{{ $applicationform->id }}</td>
                        <td>{{ $applicationform->email }}</td>
                        <td>{{ $applicationform->openPosition->open_position_name }}</td>
                        <td><a href="{{ $applicationform->pdfUrl }}" target="_blank">Xem CV</a></td>
                        <td>{{ $applicationform->submitted_at }}</td>
                        <td>
                            <!-- Nút gửi phản hồi -->
                            <button class="btn btn-success btn-sm send-email-btn" onclick="openDialogConfirmEmail()">
                                <i class="fa-solid fa-paper-plane"></i> Gửi phản hồi
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
