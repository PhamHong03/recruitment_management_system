<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobPosting\JobPostingRequest;
use App\Http\Services\JobPosting\JobPostingService;
use App\Models\JobPosting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    protected $jobPostingService;

    public function __construct(JobPostingService $jobPostingService)
    {
        $this->jobPostingService = $jobPostingService;
    }

    public function create(){
        return view('admin.job_postings.add', [
            'title' => 'Tạo bài đăng'
        ]);
    }

    public function store(JobPostingRequest $request)  {
        $this->jobPostingService->create($request);

        return redirect()->back();
    }

    public function index(){

        // $jobPostings = $this->jobPostingService->getAll();
        $jobPostings = $this->jobPostingService->get();

        return view('admin.job_postings.list', [
            'title' => 'Danh sách bài đăng',
            'job_postings' => $jobPostings
        ]);
    }

    public function destroy(Request $request): JsonResponse{
        $result = $this->jobPostingService->destroy($request);
        if($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa bài đăng thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function show(JobPosting $job_posting){
        return view('admin.job_postings.edit', [
            'title' => 'Chỉnh sửa bài đăng',
            'job_posting' => $job_posting
        ]);
    }

    public function update(JobPosting $job_posting, Request $request){
        $this->jobPostingService->update($request, $job_posting);

        return redirect('admin/job-posting/list');
    }
}
