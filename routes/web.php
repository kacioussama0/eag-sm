<?php

use Illuminate\Support\Facades\Route;

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

// index routing via Route feature
Route::redirect('/', '/platform/school');



Route::prefix('platform')->group(function () {
    Route::resource('school', \App\Http\Controllers\SchoolController::class)->name('','school');
    Route::resource('cycles', \App\Http\Controllers\CycleController::class)->name('','cycles');
    Route::resource('branches', \App\Http\Controllers\BranchController::class)->name('','branches');
    Route::resource('levels', \App\Http\Controllers\LevelController::class)->name('','levels');
});
