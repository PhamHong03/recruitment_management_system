@extends('admin.main')
@section('content')
    <div class="container">
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
                    <tr id="application-{{ $applicationform->id }}" class="{{ $applicationform->status == 0 ? '' : 'custom-class' }}">
                        <td>{{ $applicationform->id }}</td>
                        <td>{{ $applicationform->email }}</td>
                        <td>{{ $applicationform->openPosition->open_position_name }}</td>
                        <td><a href="{{ $applicationform->pdfUrl }}" target="_blank">Xem CV</a></td>
                        <td>{{ $applicationform->submitted_at }}</td>
                        <td>
                            <button class="btn btn-success btn-sm send-email-btn" 
                                    onclick="sendEmail('{{ $applicationform->email }}', '{{ $applicationform->openPosition->open_position_name }}', {{ $applicationform->id }}, this)" 
                                    {{ $applicationform->status == 0 ? 'disabled' : '' }}>
                                <i class="fa-solid fa-paper-plane"></i> Gửi phản hồi
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </div>

    <style>
        /* Tùy chỉnh màu nền cho các dòng có trạng thái đã phản hồi */
        .custom-class {
            background-color: white;  /* Màu nền trắng */
        }
    </style>

    <script>
        function sendEmail(email, position, id, btn) {
            const subject = encodeURIComponent("Cảm ơn bạn đã tham gia ứng tuyển tại Samsung");
            const body = encodeURIComponent(`Chào bạn,\n\nCảm ơn bạn đã gửi CV đến công ty Samsung. Chúng tôi đánh giá cao sự quan tâm của bạn đối với vị trí [Tên Vị Trí] tại công ty.\n\nNếu trong vòng 2 tuần kể từ ngày gửi hồ sơ, bạn chưa nhận được phản hồi từ chúng tôi, điều này có nghĩa là hồ sơ của bạn không vượt qua vòng kiểm duyệt. Tuy nhiên, nếu hồ sơ của bạn được chọn, bạn sẽ nhận được cuộc gọi từ bộ phận tuyển dụng để lên lịch phỏng vấn theo thời gian thuận tiện nhất cho bạn.\n\nChúng tôi mong muốn sẽ có cơ hội làm việc cùng bạn và chúc bạn một ngày tốt lành!\n\nTrân trọng,\n\nCẩm Hồng\nBộ phận Tuyển dụng\nSamsung Electronics\nThông tin liên hệ:\nSDT: 03882929292\nEmail: phamhong@gmail.com`);
            const gmailURL = `https://mail.google.com/mail/?view=cm&fs=1&to=${email}&su=${subject}&body=${body}`;

            // Mở Gmail để gửi email
            window.open(gmailURL, '_blank');

            // Cập nhật trạng thái ứng tuyển sau khi gửi email
            fetch(`/update-status/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    status: 0  // Đặt trạng thái lại là 0 sau khi gửi email
                })
            })
            .then(response => response.json())
            .then(data => {
                // Cập nhật UI để nút "Gửi phản hồi" bị vô hiệu hóa nếu trạng thái là 1
                document.getElementById(`application-${id}`).classList.add('custom-class');
                btn.disabled = true;
            })
            .catch(error => console.error('Error updating status:', error));
        }
    </script>
@endsection
