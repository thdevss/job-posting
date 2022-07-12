<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\JobController;
use \App\Http\Controllers\AdminJobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [JobController::class, 'index'])->name('job.index');


Route::prefix('job')->name('job.')->group(function () {
    Route::get('/type/{type?}', [JobController::class, 'view_by_job_type'])->name('by_type');
    Route::get('/degree/{degree?}', [JobController::class, 'view_by_job_degree'])->name('by_degree');

    Route::get('/new', [JobController::class, 'create'])->name('new');


    Route::get('/{job}', [JobController::class, 'show'])->name('detail');
});



Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('pages.admin.dashboard');
    })->name('dashboard');


    Route::get('/job', [AdminJobController::class, 'index'])->name('job');
    Route::get('/job/{job}', [AdminJobController::class, 'show'])->name('job.show');
    Route::put('/job/{job}', [AdminJobController::class, 'update'])->name('job.update');
    Route::delete('/job/{manga}', [AdminJobController::class, 'destroy'])->name('job.destroy');


    // other admin routes here
});


require __DIR__.'/auth.php';
