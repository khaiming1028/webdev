<?php

use App\Models\Job;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('main');
});

//Route for job dashboard page
Route::prefix('job')->group(function (){
    Route::get('/',[MainController::class,'viewJob'])->name('job.view');
    Route::get('/create',[MainController::class,'createJob'])->name('job.create');
    Route::post('/',[MainController::class,'storeJob'])->name('job.store');
    Route::get('/{job}/edit',[MainController::class,'editJob'])->name('job.edit');
    Route::put('/{job}/update',[MainController::class,'updateJob'])->name('job.update');
    Route::delete('/{job}/destroy',[MainController::class,'destroyJob'])->name('job.destroy');
});

//route for student details dashboard page
Route::prefix('student')->group(function(){
    Route::get('/',[MainController::class,'viewStudent'])->name('student.view');
    Route::get('/create',[MainController::class,'createStudent'])->name('student.create');
    Route::post('/',[MainController::class,'storeStudent'])->name('student.store');
    Route::get('/{student}/edit',[MainController::class,'editStudent'])->name('student.edit');
    Route::put('/{student}/update',[MainController::class,'updateStudent'])->name('student.update');
    Route::delete('/{student}/destroy',[MainController::class,'destroyStudent'])->name('Student.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
