<?php

namespace App\Http\Services;

use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ApplicationFormService {

    public function create($request) {
        // dd($request->all());
        try {
            // dd($request->input('pdf_file'));
            if ($request->hasFile('pdf_file')) {
                $pdfFile = $request->file('pdf_file');
                // dd($request->file('pdf_file'));

                if ($pdfFile->isValid()) {
                    $cvPath = $pdfFile->store('upload2', 'public');
                    // dd($cvPath);
                    ApplicationForm::create([
                        'email' => $request->input('email'),
                        'job_position_id' => $request->input('job_position_id'),
                        'pdf_file_path' => $cvPath,  
                        'submitted_at' => now(),
                    ]);

                    Session::flash('success', 'Gửi CV thành công');
                } else {
                    Session::flash('error', 'File không hợp lệ hoặc quá lớn');
                    return false;
                }
            } else {
                Session::flash('error', 'Vui lòng chọn tệp CV');
                return false;
            }
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function getAll(){
        return ApplicationForm::orderbyDesc('id')->paginate(8);
    }
}
