@extends('admin.main')

@section('head')

<script src="{{ asset('ckeditor5/ckeditor5.umd.js') }}"></script>


@endsection

@section('content')
        
    <form action="" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="branch_name">Tên đợt ứng tuyển</label>
                        <input type="text" name="hiring_round_name" value="{{ $hiring_round->hiring_round_name }}" class="form-control" placeholder="Nhập tên đợt ứng tuyển">
                    </div>
                </div>     
                <div class="col-md-4">
                    <label for="start_date">Ngày bắt đầu:</label>
                    <input type="date" name="start_date" value="{{ isset($hiring_round->start_date) ? date('Y-m-d', strtotime($hiring_round->start_date)) : '' }}" class="form-control">
                </div>
                
                <div class="col-md-4">
                    <label for="end_date">Ngày kết thúc:</label>
                    <input type="date" name="end_date" value="{{ isset($hiring_round->end_date) ? date('Y-m-d', strtotime($hiring_round->end_date)) : '' }}" class="form-control">
                </div>
                 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label >Mô tả chi tiết</label>
                        <textarea name="description" id="description"  class="form-control">{{ $hiring_round->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">   
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Kích hoạt</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" 
                                   value="1" name="active" id="active" 
                                   {{ $hiring_round->active == 1 ? 'checked' : '' }}>
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" 
                                   value="0" name="active" id="noactive" 
                                   {{ $hiring_round->active == 0 ? 'checked' : '' }}>
                            <label for="noactive" class="custom-control-label">Không</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="pending">Chờ duyệt</option>
                            <option value="ongoing">Đang diễn ra</option>
                            <option value="completed">Hoàn thành</option>
                            <option value="canceled">Hủy</option>
                        </select>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo đợt ứng tuyển</button>
        </div>
    </form>    

@endsection
