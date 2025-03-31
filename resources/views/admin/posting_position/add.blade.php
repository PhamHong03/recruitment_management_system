@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
        
    <form action="" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="job_posting_id">Bài đăng tuyển</label>
                    <select name="job_posting_id" class="form-control" id="job_posting_id" required>
                        <option value="">Chọn bài đăng</option>
                        @foreach ($jobPostings as $jobPosting)
                            <option value="{{ $jobPosting->id }}">{{ $jobPosting->job_posting_name }}</option>
                        @endforeach
                    </select>
                </div>     
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="open_position_id">Chọn vị trí tuyển dụng</label>
                        <select name="open_position_id" class="form-control" id="open_position_id" required>
                            <option value="">Chọn chi nhánh</option>
                            @foreach ($openPositions as $openPosition)
                                <option value="{{ $openPosition->id }}">{{ $openPosition->open_position_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>     
            </div>
            <div class="row">   
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Kích hoạt</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" value="1" name="active" id="active" checked>
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" value="0" name="active" id="noactive">
                            <label for="noactive" class="custom-control-label">Không</label>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm vị trí cho bài đăng tuyển</button>
        </div>
    </form>    

@endsection
@section('foot')
<script> 
    
    CKEDITOR.replace( 'description' );
</script>
@endsection