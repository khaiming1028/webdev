<?php

use App\Models\Job;
use App\Models\Student;
use App\Models\Forum;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;





//Student
Route::get('/',[MainController::class,'index'])->name('main');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('is_user')->prefix('student')->group(function (){
        Route::middleware('check_student_profile')->group(function (){
            Route::get('result',[MainController::class,'searchJob_main'])->name('job.result');
            Route::get('profile-main',[StudentController::class,'profile'])->name('view.profile');
            Route::get('{student}/edit',[StudentController::class,'editStudent'])->name('student.edit');
            Route::put('{student}/update',[StudentController::class,'updateStudent'])->name('student.update');

            Route::prefix('forum')->group(function (){
                Route::get('/',[ForumController::class,'viewForum'])->name('forum.view');
                Route::get('/create',[ForumController::class,'createForum'])->name('forum.create');
                Route::post('/',[ForumController::class,'storeForum'])->name('forum.store');
                Route::get('/{forum}/edit',[ForumController::class,'editForum'])->name('forum.edit');
                Route::put('/{forum}/update',[ForumController::class,'updateForum'])->name('forum.update');
                Route::delete('/{forum}/destroy',[ForumController::class,'destroyForum'])->name('forum.destroy');
            });
        });

        Route::get('create',[StudentController::class,'createStudent'])->name('student.create');
        Route::post('/',[StudentController::class,'storeStudent'])->name('student.store');
        Route::post('/jobs/{job}/apply', [MainController::class, 'applyForJob'])->name('jobs.apply');

    });

    Route::middleware('is_admin')->prefix('admin')->group(function (){
        // Route::prefix('forum')->group(function (){
        //     Route::get('/',[ForumController::class,'viewForum'])->name('forum.view');
        //     Route::get('/create',[ForumController::class,'createForum'])->name('forum.create');
        //     Route::post('/',[ForumController::class,'storeForum'])->name('forum.store');
        //     Route::get('/{forum}/edit',[ForumController::class,'editForum'])->name('forum.edit');
        //     Route::put('/{forum}/update',[ForumController::class,'updateForum'])->name('forum.update');
        //     Route::delete('/{forum}/destroy',[ForumController::class,'destroyForum'])->name('forum.destroy');
        // });
        Route::prefix('job')->group(function (){
            Route::get('/',[MainController::class,'viewJob'])->name('job.view');
            Route::get('/create',[MainController::class,'createJob'])->name('job.create');
            Route::post('/',[MainController::class,'storeJob'])->name('job.store');
            Route::get('/{job}/edit',[MainController::class,'editJob'])->name('job.edit');
            Route::put('/{job}/update',[MainController::class,'updateJob'])->name('job.update');
            Route::delete('/{job}/destroy',[MainController::class,'destroyJob'])->name('job.destroy');
        });
        Route::prefix('student')->group(function(){
            Route::get('/',[StudentController::class,'viewStudent'])->name('student.view');
            Route::delete('/{student}/destroy',[StudentController::class,'destroyStudent'])->name('student.destroy');
        });
        Route::get('/job-applications', [MainController::class, 'viewJobApplications'])->name('job-applications.view');

    });

});

require __DIR__.'/auth.php';
