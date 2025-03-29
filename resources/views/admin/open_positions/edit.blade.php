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
                    <div class="form-group">
                        <label for="open_position_name">Tên vị trí</label>
                        <input type="text" name="open_position_name" value="{{ $open_position->open_position_name}}" class="form-control" placeholder="Nhập tên vị trí tuyển dụng">
                    </div>
                </div>     
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="open_position_requirements">Yêu cầu tuyển dụng</label>
                        <input type="text" name="open_position_requirements" value="{{ $open_position->open_position_requirements}}"  class="form-control" placeholder="Nhập yêu cầu cho vị trí tuyển dụng">
                    </div>
                </div>     
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="branch_id">Chọn chi nhánh</label>
                        <select name="branch_id" class="form-control" id="branch_id" required>
                            <option value="">Chọn chi nhánh</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}" 
                                    @if ($open_position->branch_id == $branch->id) selected @endif>
                                    {{ $branch->branch_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="hiring_round_id">Chọn đợt ứng tuyển</label>
                        <select name="hiring_round_id" class="form-control" id="hiring_round_id" required>
                            <option value="">Chọn đợt ứng tuyển</option>
                            @foreach ($hiringRounds as $hiringRound)
                                <option value="{{ $hiringRound->id }}" 
                                    @if ($open_position->hiring_round_id == $hiringRound->id) selected @endif>
                                    {{ $hiringRound->hiring_round_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label >Mô tả chi tiết</label>
                        <textarea name="open_position_description" id="description"  class="form-control">{{ $open_position->open_position_description}}</textarea>
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
                                   {{ $open_position->active == 1 ? 'checked' : '' }}>
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" 
                                   value="0" name="active" id="noactive" 
                                   {{ $open_position->active == 0 ? 'checked' : '' }}>
                            <label for="noactive" class="custom-control-label">Không</label>
                        </div>
                    </div>
                </div>
                </div>
                
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Vị trí tuyển dụng mới</button>
        </div>
    </form>    

@endsection
@section('foot')
<script> 
    
    CKEDITOR.replace( 'description' );
</script>
@endsection