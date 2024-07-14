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
Route::redirect('/', '/platform/school/1');



Route::prefix('platform')->group(function () {
    Route::resource('school', \App\Http\Controllers\SchoolController::class)->name('','school');
    Route::resource('cycles', \App\Http\Controllers\CycleController::class)->name('','cycles');
    Route::resource('branches', \App\Http\Controllers\BranchController::class)->name('','branches');
    Route::resource('levels', \App\Http\Controllers\LevelController::class)->name('','levels');
    Route::resource('rooms', \App\Http\Controllers\RoomController::class)->name('','rooms');
    Route::resource('classes', \App\Http\Controllers\ClassesController::class)->name('','classes');
    Route::resource('school-documents', \App\Http\Controllers\SchoolDocumentController::class)->name('','school-documents');
    Route::get('branches/levels/{branchId}/',[\App\Http\Controllers\ClassesController::class,'branchLevels']);
});

Route::prefix('settings')->group(function () {
    Route::get('/{setting}', [\App\Http\Controllers\SettingController::class,'index']);
    Route::post('/{setting}', [\App\Http\Controllers\SettingController::class,'store']);
    Route::get('/{setting}/edit/{id}', [\App\Http\Controllers\SettingController::class,'edit']);
    Route::put('/{setting}/edit/{id}', [\App\Http\Controllers\SettingController::class,'update']);
    Route::delete('/{setting}/{id}', [\App\Http\Controllers\SettingController::class,'destroy']);
});

Route::resource('services', \App\Http\Controllers\ServiceController::class)->name('','services');
Route::resource('sub-services', \App\Http\Controllers\SubServiceController::class)->name('','sub-services');

Route::prefix('human-resources')->group(function () {
   Route::resource('staff',\App\Http\Controllers\StaffController::class)->name('','staff');
});
