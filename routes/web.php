<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\HiringRoundController;
use App\Http\Controllers\Admin\JobPostingController;
use App\Http\Controllers\Admin\OpenPositionController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);

Route::get('admin/users/login',[LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store',[LoginController::class, 'store']);

Route::get('/sign-out', [LoginController::class, 'sign_out'])->name('sign-out');

Route::middleware(['auth'])->group(function() {

    // Route::get('admin/main', [MainController::class, 'index'])->name('admin');

    Route::prefix('admin')->group(function() {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
     
        #Branch
        Route::prefix('branch')->group(function (){
            
            Route::get('add', [BranchController::class, 'create'])->name('branch_add');
            
            Route::post('add', [BranchController::class, 'store']);

            Route::get('list', [BranchController::class, 'index'])->name('branch_list');
        
            Route::get('edit/{branch}', [BranchController::class, 'show']);
            
            Route::post('edit/{branch}', [BranchController::class, 'update']);
            
            Route::DELETE('destroy', [BranchController::class, 'destroy']);

        });
        
        #Hiring Rounds
        Route::prefix('hiring-round')->group(function (){
            
            Route::get('add', [HiringRoundController::class, 'create'])->name('hiring_round_add');
            
            Route::post('add', [HiringRoundController::class, 'store']);

            Route::get('list', [HiringRoundController::class, 'index'])->name('hiring_round_list');
        
            Route::get('edit/{hiring_round}', [HiringRoundController::class, 'show']);
            
            Route::post('edit/{hiring_round}', [HiringRoundController::class, 'update']);
            
            Route::DELETE('destroy', [HiringRoundController::class, 'destroy']);

        });
        
        #Job-posting
        Route::prefix('job-posting')->group(function (){
            
            Route::get('add', [JobPostingController::class, 'create'])->name('job-posting-add');
            
            Route::post('add', [JobPostingController::class, 'store']);

            Route::get('list', [JobPostingController::class, 'index'])->name('job-posting-list');
        
            Route::get('edit/{job_posting}', [JobPostingController::class, 'show']);
            
            Route::post('edit/{job_posting}', [JobPostingController::class, 'update']);
            
            Route::DELETE('destroy', [JobPostingController::class, 'destroy']);

        });
        
        #Open position
        Route::prefix('open-position')->group(function (){
    
            Route::get('add', [OpenPositionController::class, 'create'])->name('open-position-add');
            
            Route::post('add', [OpenPositionController::class, 'store']);

            Route::get('list', [OpenPositionController::class, 'index'])->name('open-position-list');
        
            Route::get('edit/open_position}', [OpenPositionController::class, 'show']);
            
            Route::post('edit/{open_position}', [OpenPositionController::class, 'update']);
            
            Route::DELETE('destroy', [OpenPositionController::class, 'destroy']);

        });




        #upload
        Route::post('upload/services', [UploadController::class, 'store']);
    });    
     
}); 