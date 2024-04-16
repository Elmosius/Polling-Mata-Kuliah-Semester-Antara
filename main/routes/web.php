<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/', [\App\Http\Controllers\PollingDetailController::class, 'index'])
        ->name('dashboard.index');

    Route::resource('/dashboard/polling', \App\Http\Controllers\PollingController::class)
    ->except(['show']);

    Route::resource('/dashboard/polling-detail',
        \App\Http\Controllers\PollingDetailController::class)->except(['show', 'create', 'destroy']);

//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



});

Route::middleware('adminorkaprodi')->group(function () {
    Route::resource('/dashboard/mata-kuliah', \App\Http\Controllers\MataKuliahController::class)
    ->except('show');

    Route::resource('/dashboard/kurikulum', \App\Http\Controllers\KurikulumController::class)
    ->except('show');

    Route::resource('/dashboard/users', \App\Http\Controllers\UserController::class)
        ->except('show');

    Route::get('/dashboard/polling-hasil', [\App\Http\Controllers\PollingController::class, 'hasil'])
        ->name('polling.hasil');

    Route::get('/dashboard/make-polling', [\App\Http\Controllers\PollingController::class, 'makePolling'])
        ->name('polling.make-polling');

    Route::get('/dashboard/polling-detail-hasil/{polling_detail}/{id_mataKuliah}',
        [\App\Http\Controllers\PollingDetailController::class, 'detailHasil'])
        ->name('polling.detailHasil');
});

require __DIR__ . '/auth.php';
