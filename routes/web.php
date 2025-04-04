<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\HiringRoundController;
use App\Http\Controllers\Admin\JobPostingController;
use App\Http\Controllers\Client\JobPostingClientController;
use App\Http\Controllers\Admin\PostingPositionController;
use App\Http\Controllers\Admin\OpenPositionController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Admin\ApplicationFormController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('clients.home');
Route::get('/login', [LoginController::class, 'login'])->name('loginClients');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'postLogin']);
Route::post('/register', [LoginController::class, 'postRegister']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logoutClients');


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

        #Posting position
        Route::prefix('posting-position')->group(function (){
            
            Route::get('add', [PostingPositionController::class, 'create'])->name('posting-position-add');
            
            Route::post('add', [PostingPositionController::class, 'store']);

            Route::get('list', [PostingPositionController::class, 'index'])->name('posting-position-list');

            Route::get('edit/open_position}', [PostingPositionController::class, 'show']);
            
            Route::post('edit/{open_position}', [PostingPositionController::class, 'update']);
            
            Route::DELETE('destroy', [PostingPositionController::class, 'destroy']);

        });
        #uploads
        Route::post('upload/services', [UploadController::class, 'store']);

        #application-form 
        Route::prefix('application-form')->group(function (){
            
            Route::get('list', [ApplicationFormController::class, 'index'])->name('application-form-list');
            
            Route::post('/list/{id}', [ApplicationFormController::class, 'updateStatus']);

        });
    });   
    
    // Route::get('job-postings', [JobPostingClientController::class, 'index']);

    Route::get('job-postings', [HomeController::class, 'jobPosting'])->name('job-posting');
    Route::get('about', [HomeController::class, 'about'])->name('home-about');
    Route::get('apply', [HomeController::class, 'apply'])->name('home-apply');
    Route::get('join-us', [HomeController::class, 'joinus'])->name('home-joinus');
    Route::get('our-team', [HomeController::class, 'ourteam'])->name('home-ourteam');
    
    Route::get('postingposition/{id}.html', [HomeController::class, 'postingposition'])->name('postingpositionClients');
    Route::post('postingposition/{id}', [HomeController::class, 'postingpositionStore']);
    
    Route::get('/services/load-job-posting', [HomeController::class, 'loadJobPosting']);

    Route::post('upload/services', [UploadController::class, 'store2']);

    Route::post('/update-status/{id}', [ApplicationFormController::class, 'updateStatus']);


}); 