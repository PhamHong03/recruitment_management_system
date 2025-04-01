<div class="row" >
  @foreach ($job_postings as $job_posting)
    <div class="col-md-4 ">
      <div class="box ">
        <div class="img-box">
          <img src="{{ $job_posting->job_posting_poster }}" alt="{{ $job_posting->job_posting_name }}">
        </div>
        <div class="detail-box">
          <h5>{{ $job_posting->job_posting_name }}</h5>
          <p>{{ Str::limit($job_posting->job_posting_description, 100) }}</p>
          <a href="{{ route('postingpositionClients', ['id' => $job_posting->id]) }}">Xem thêm</a>
        </div>
      </div>
    </div>
  @endforeach
</div>