<?php

namespace App\Http\Controllers;

use App\Http\Services\ApplicationFormService;

use App\Http\Controllers\Controller;

class ApplicationFormController extends Controller
{
    protected $applicationFormService;

    public function __construct(ApplicationFormService $applicationFormService) {
        $this->applicationFormService = $applicationFormService;
    }

    // public function index(ApplicationFormRequest $request){
    //     dd($request->all());
    //     $this->applicationFormService->create($request);
    //     return redirect()->route('clients.home');
    // }
}
