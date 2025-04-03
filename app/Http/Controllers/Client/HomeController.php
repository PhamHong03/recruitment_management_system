<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\JobPosting\JobPostingClientService;
use Illuminate\Http\Request;

use App\Http\Requests\ApplicationFormRequest;
use App\Http\Services\ApplicationFormService;

class HomeController extends Controller
{

    protected $jobPostingClientService;
    protected $applicationFormService;

    public function __construct(JobPostingClientService $jobPostingClientService, ApplicationFormService $applicationFormService ) {
        $this->jobPostingClientService = $jobPostingClientService;
        $this->applicationFormService = $applicationFormService;
    }

    public function index(){
        $job_postings = $this->jobPostingClientService->get(); 
        return view('clients.home', compact('job_postings')); 
    }
    

    public function about(){
        return view('clients.about');
    }



    public function loadJobPosting(Request $request) {

        $page = $request->input('page', 0);
        $job_postings = $this->jobPostingClientService->get($page);
        
        if (count($job_postings) != 0) {
            $html = view('clients.home', compact('job_postings'))->render();
    
            return response()->json([
                'html' => $html
            ]);
        }
        return response()->json([
            'html' => ''
        ]);
    }

    public function postingposition($id = ''){
        $jobPosting = $this->jobPostingClientService->show($id);

        if (!$jobPosting) {
            return redirect()->route('home')->with('error', 'Bài đăng không tồn tại');
        }
        
        return view('clients.job_posting_detail', compact('jobPosting'));

    }

    // public function postingpositionStore(Request $request)
    // {
    //     $this->jobPostingClientService->storeApplicationForm($request);
    
    //     return redirect()->back();
    // }

    public function postingpositionStore(ApplicationFormRequest $request){
        // dd($request->all());
        $reuslt = $this->applicationFormService->create($request);
        if($reuslt) {

            return redirect()->route('clients.home');
        }else{

        return redirect()->back();
        }
    }
    
}
