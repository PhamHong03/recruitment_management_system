<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\PostingPosition\PostingPositionService;
use App\Http\Services\JobPosting\JobPostingService;
use App\Http\Services\OpenPosition\OpenPositionService;
use App\Http\Requests\PostingPosition\PostingPositionRequest;
use App\Models\OpenPosition;
use App\Models\JobPosting;

class PostingPositionController extends Controller
{
    protected $postingPositionService;
    protected $jobPostingService;
    protected $openPositionService;

    public function __construct(PostingPositionService $postingPositionService, JobPostingService $jobPostingService, OpenPositionService $openPositionService) {
        $this->postingPositionService = $postingPositionService;
        $this->jobPostingService = $jobPostingService;
        $this->openPositionService = $openPositionService;
    }

    public function create(){

        $jobPosting = JobPosting::all(); 
        $openPosition = OpenPosition::all(); 
        return view('admin.posting_position.add', [
            'title' => 'Thêm vị trí cho bài tuyển dụng',
            'jobPostings' => $jobPosting,
            'openPositions' => $openPosition,
        ]);
    }

    public function store(PostingPositionRequest $request) {
        $this->postingPositionService->create($request);
        return redirect()->back();
    }



}
