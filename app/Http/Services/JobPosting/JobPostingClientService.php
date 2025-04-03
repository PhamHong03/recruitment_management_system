<?php
namespace App\Http\Services\JobPosting;

use App\Models\JobPosting;
use App\Models\ApplicationForm;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Js;
use Illuminate\Support\Facades\Log;

class JobPostingClientService{
    const LIMIT = 3;
    public function get($page = null){
        return JobPosting::select('id', 'job_posting_name', 'job_posting_description', 'job_posting_request', 'job_posting_content', 'job_posting_salary', 'job_posting_start_date', 'job_posting_end_date', 'job_posting_status', 'job_posting_poster')
        ->orderByDesc('id')
        ->when($page != null, function($query) use ($page){
            $query->offset($page * self::LIMIT);
        })
        ->limit(self::LIMIT)
        ->get();
    }

    // public function show($id)
    // {
    //     return JobPosting::with('openPositions')->findOrFail($id);
    // }

    public function show($id)
    {
        return JobPosting::with('openPositions.branch')->findOrFail($id);
    }
    public function storeApplicationForm($request)
    {
        try {
            ApplicationForm::create([
                'email' => (string)$request->input('email'),
                'job_position_id' => (string)$request->input('job_position_id'),
                'pdf_file_path' => (string)$request->input('pdf_file_path'),
                'submitted_at' => now()
            ]);
            Session::flash('success', 'Ứng tuyển thành công!');

        } catch (\Exception $e) {
            Session::flash('error', 'Thất bại, vui lòng thử lại!' . $e->getMessage());
            return false;
        }
    }
    

}