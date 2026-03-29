<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScholarshipApplicationController;


Route::get('/student/application/create', [ScholarshipApplicationController::class, 'create'])->name('student.application.create');
Route::post('/student/application/store', [ScholarshipApplicationController::class, 'store'])->name('student.application.store');
Route::get('/admin/application/create', [ScholarshipApplicationController::class, 'adminCreate'])->name('admin.application.create');
Route::post('/admin/application/store', [ScholarshipApplicationController::class, 'adminStore'])->name('admin.application.store');
Route::get('/applications', [ScholarshipApplicationController::class, 'index'])->name('applications.index');
Route::get('/applications/edit/{id}', [ScholarshipApplicationController::class, 'edit'])->name('applications.edit');
Route::post('/applications/update/{id}', [ScholarshipApplicationController::class, 'update'])->name('applications.update');
Route::post('/applications/delete/{id}', [ScholarshipApplicationController::class, 'destroy'])->name('applications.destroy');
Route::get('/', function () {
    return view('home');
})->name('home');
Route::put('/applications/update/{id}', [ScholarshipApplicationController::class, 'update'])->name('applications.update');
