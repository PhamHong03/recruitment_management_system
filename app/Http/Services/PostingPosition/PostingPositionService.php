<?php

namespace App\Http\Services\PostingPosition;
use App\Models\PostingPosition;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Js;

class PostingPositionService {

   
    public function create($request){
        try {
            PostingPosition::create([
                'job_posting_id' => (string)$request->job_posting_id,
                'open_position_id' => (string)$request->open_position_id,
                'active' => 1
            ]);

            Session::flash('success', 'Thêm vị trí bài đăng thành công');
        }catch(\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    
}