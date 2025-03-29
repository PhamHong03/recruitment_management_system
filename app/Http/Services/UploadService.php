<?php

namespace App\Http\Services;

use App\Models\JobPosting\JobPosting;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;
 
class UploadService {
    public function store($request) {
        if($request->hasFile('file')) {
            try{

                $name = $request->file('file')->getClientOriginalName();

                $pathFull = 'uploads/' .date("Y/m/d");
                $request->file('file')->storeAs('public/' . $pathFull, $name);


                return '/storage/' . $pathFull . '/' . $name;
            }catch(\Exception $error)
            {
                return response()->json(['error' => true, 'message' => $error->getMessage()]);
            }
        }
    }  
}