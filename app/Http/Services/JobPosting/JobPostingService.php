<?php
namespace App\Http\Services\JobPosting;

use App\Models\JobPosting;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Js;

class JobPostingService{
    
    public function create($request){
        try{

            JobPosting::create([
                'job_posting_name' => (string)$request->input('job_posting_name'),
                'job_posting_description' => (string)$request->input('job_posting_description'),
                'job_posting_request' => (string)$request->input('job_posting_request'),
                'job_posting_content' => (string)$request->input('job_posting_content'),
                'job_posting_salary' => (string)$request->input('job_posting_salary'),
                'job_posting_start_date' => (string)$request->input('job_posting_start_date'),
                'job_posting_end_date' => (string)$request->input('job_posting_end_date'),
                'job_posting_status' => (string)$request->input('job_posting_status'),
                'job_posting_poster' => (string)$request->input('job_posting_poster'),
                'active' => (int)$request->input('active')
            ]);
            Session::flash('success', 'Tạo bài đăng tuyển dụng thành công');

        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function getAll(){
        return JobPosting::where('active',1)->get();
    }

    public function destroy($request){
        $id = (int)$request->input('id');
        $job_posting = JobPosting::where('id', $id)->first();

        if($job_posting){

            return JobPosting::where('id', $id)->delete();
        }
        return false;
    }

    public function update($request, $job_posting){
        // dd($request->all());
        $job_posting->fill($request->all());
        $job_posting->save();

        Session::flash('success','Cập nhật bài đăng thành công');
    }

    public function get() {
        return JobPosting::orderByDesc('id')->paginate(2);
    }


}