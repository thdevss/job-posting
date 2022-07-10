<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\JobController;
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
    Route::get('/type', [JobController::class, 'index'])->name('by_type');
    Route::get('/degree', [JobController::class, 'index'])->name('by_degree');

    Route::get('/new', [JobController::class, 'index'])->name('new');


    Route::get('/{job}', [JobController::class, 'show'])->name('detail');
});



Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/manga', [MangaController::class, 'index'])->name('manga');
    // Route::get('/manga/add', [MangaController::class, 'create'])->name('manga.add');
    // Route::post('/manga', [MangaController::class, 'store'])->name('manga.store');
    // Route::get('/manga/{manga}', [MangaController::class, 'show'])->name('manga.show');
    // Route::delete('/manga/{manga}', [MangaController::class, 'destroy'])->name('manga.destroy');


    // other admin routes here
});


require __DIR__.'/auth.php';
