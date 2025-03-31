<?php
namespace App\Http\Services\JobPosting;

use App\Models\JobPosting;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Js;

class JobPostingClientService{
    const LIMIT = 3;
    // public function get(){
    //     return JobPosting::select('id', 'job_posting_name', 'job_posting_description', 'job_posting_request', 'job_posting_content', 'job_posting_salary', 'job_posting_start_date', 'job_posting_end_date', 'job_posting_status', 'job_posting_poster')
    //     ->orderByDesc('id')
    //     ->when($page != null, function($query) use ($page){
    //         $query->offset($page * self::LIMIT);
    //     })
    //     ->limit(self::LIMIT)
    //     ->get();
    // }

    public function get(){
        $data =  JobPosting::select('id', 'job_posting_name', 'job_posting_description', 'job_posting_request', 'job_posting_content', 'job_posting_salary', 'job_posting_start_date', 'job_posting_end_date', 'job_posting_status', 'job_posting_poster')
        ->orderByDesc('id')
        ->limit(3)
        ->get();
        // dd($data);
        return $data;
    }
    

}