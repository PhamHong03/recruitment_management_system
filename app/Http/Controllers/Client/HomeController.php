<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\JobPosting\JobPostingClientService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $jobPostingClientService;
    public function __construct(JobPostingClientService $jobPostingClientService ) {
        $this->jobPostingClientService = $jobPostingClientService;
    }

    public function index(){
        $job_postings = $this->jobPostingClientService->get(); // Lấy dữ liệu từ Service
        return view('clients.home', compact('job_postings')); // Truyền vào home
    }
    

    public function about(){
        return view('clients.about');
    }
}
