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
      @include('admin.alert')
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
  
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="cv-upload">       
              <label for="position">Chọn vị trí:</label>
              <select name="job_position_id" id="position" required>
                  {{-- @foreach($jobPosting->openPositions as $position)
                      <option value="{{ $position->id }}">{{ $position->open_position_name }}</option>
                  @endforeach --}}
                  @foreach($jobPosting->openPositions as $openPosition)
                    <option value="{{ $openPosition->id }}">
                        {{ $openPosition->open_position_name }} - {{ $openPosition->branch->branch_name }}
                    </option>
                  @endforeach
              </select>
                @error('job_position_id')
                  <div class="ms-5 text-danger">{{$message}}</div>
                @enderror
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" placeholder="Nhập email của bạn" required>
                @error('email')
                  <div class="ms-5 text-danger">{{$message}}</div>
                @enderror
              <label for="cv">Chọn CV:</label>
              <input type="file" name="pdf_file" id="upload2" required>
              @error('pdf_file')
                <div class="ms-5 text-danger">{{$message}}</div>
              @enderror
              <p class="cv-upload-note">Tên CV: CV_Ho&Ten.pdf</p>
          
              <button type="submit">Gửi CV</button>
            </div>
        </form>
      </div>
    </div>
  
    @include('clients.footer')
  
  </body>
  
  </html>