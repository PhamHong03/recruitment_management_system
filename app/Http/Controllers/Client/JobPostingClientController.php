<?php

namespace App\Http\Controllers\Client;
use App\Http\Services\JobPosting\JobPostingService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobPostingClientController extends Controller
{
    protected $jobPostingService;

    public function __construct(JobPostingServices $jobPostingService) {
        $this->jobPostingService = $jobPostingService;
    }
    
    public function index(){
        
    }
}
