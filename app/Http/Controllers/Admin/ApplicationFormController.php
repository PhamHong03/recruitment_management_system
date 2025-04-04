<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\ApplicationFormService;

use App\Http\Controllers\Controller;
use App\Models\ApplicationForm;

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

    public function index(){
        
        $applicationforms = $this->applicationFormService->getAll();

        return view('admin.application_forms.list', [
            'title' => "Danh sách CV",
            'applicationforms' => $applicationforms
        ]);
    }
    public function updateStatus($id)
    {
        $applicationform = ApplicationForm::find($id);
        if ($applicationform) {
            // Đặt trạng thái lại là 0
            $applicationform->status = 0;
            $applicationform->save();
        }
        return response()->json(['status' => 'success']);
    }
    

}
