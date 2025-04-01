<!DOCTYPE html>
<html>

<head>
  @include('clients.header')
</head>

</head>

<body>

    <div class="hero_area">
      @include('clients.headernav')
    </div>
  
    <div class="job-posting-container">
      <div class="banner">
        <img src="{{ $jobPosting->job_posting_poster }}" alt="Banner">
        <div class="position-list">
            <h3>Vị trí tuyển dụng:</h3>
            <ul>
              @foreach($jobPosting->openPositions as $position)
              <li>{{ $position->open_position_name }}</li>
              @endforeach
            </ul>
          </div>
      </div>
  
      <div class="job-details">
        <h1>{{ $jobPosting->job_posting_name }}</h1>
        <p><strong>Mô tả:</strong> {{ $jobPosting->job_posting_description }}</p>
        <p><strong>Yêu cầu:</strong> {{ $jobPosting->job_posting_request }}</p>
        <p><strong>Nội dung:</strong> {!! $jobPosting->job_posting_content !!}</p>
        <p><strong>Lương:</strong> {{ $jobPosting->job_posting_salary }}</p>
        <p><strong>Ngày bắt đầu:</strong> {{ $jobPosting->job_posting_start_date }}</p>
        <p><strong>Đến hết ngày:</strong> {{ $jobPosting->job_posting_end_date }}</p>
  

  
        <div class="cv-upload">
            <h3>Nộp CV của bạn</h3>
            <input type="file" name="cv" accept=".pdf,.doc,.docx">
            <input type="email" name="email" placeholder="Nhập email của bạn" required>
            <button type="submit">Gửi CV</button>

            <!-- Thông báo tên file CV -->
            <p class="cv-upload-note">Tên CV: CV_Ho&Ten.pdf</p>
        </div>
      </div>
    </div>
  
    @include('clients.footer')
  
  </body>
  
  </html>