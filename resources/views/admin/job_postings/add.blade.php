@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')        
    <form action="" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="branch_name">Tên bài đăng</label>
                        <input type="text" name="job_posting_name"  class="form-control" placeholder="Nhập tên bài đăng">
                    </div>
                </div>     
                <div class="col-md-4">
                    <label for="start_date">Ngày bắt đầu:</label>
                    <input type="date" name="job_posting_start_date" class="form-control" placeholder="Chọn ngày bắt đầu">
                </div>
                
                <div class="col-md-4">
                    <label for="end_date">Ngày kết thúc:</label>
                    <input type="date" name="job_posting_end_date" class="form-control" placeholder="Chọn ngày kết thúc">
                </div>
                 
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Tóm tắt</label>
                        <input type="text" name="job_posting_description" class="form-control" placeholder="Mô tả bài đăng">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Yêu cầu tuyển dụng:</label>
                        <input type="text" name="job_posting_request" class="form-control" placeholder="Yêu cầu tuyển dụng">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label >Mô tả chi tiết</label>
                        <textarea name="job_posting_content" id="job_posting_content"  class="form-control">{{ old('job_posting_content') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">  

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Banner: </label>
                        <input type="file" id="upload" class="form-control">
                        <div id="image_show">
                            
                        </div> 
                        <input type="hidden" name="job_posting_poster" id="job_posting_poster">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Lương đề xuất: </label>
                        <input type="text" name="job_posting_salary" class="form-control" placeholder="Lương cơ bản">
                    </div>
                </div>

            </div>
                
            <div class="row">
                <div class="col-md-6">
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

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_posting_status">Trạng thái</label>
                        <select name="job_posting_status" class="form-control">
                            <option value="pending">Chờ duyệt</option>
                            <option value="ongoing">Đang diễn ra</option>
                            <option value="completed">Hoàn thành</option>
                            <option value="canceled">Hủy</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm bài đăng mới</button>
        </div>
    </form>    

@endsection
@section('foot')
<script> 
    
    CKEDITOR.replace( 'job_posting_content' );
</script>
@endsection