<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormSurveyController;
use App\Http\Controllers\FormAlumniController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\LowonganKerjaController;
use App\Http\Controllers\InfoAlumniController;
use App\Http\Controllers\AlumniController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/form-survey', [FormSurveyController::class, 'formsurvey'])->name('menu.formsurvey');


Route::get('/check-nisn', [FormSurveyController::class, 'checkNisn']);
Route::post('/formsurvey/store', [FormSurveyController::class, 'store'])->name('formsurvey.store');
Route::get('/verify-nisn-survey-exists', [FormSurveyController::class, 'checkNisnExists']);

Route::get('/verify-nisn', [AlumniController::class, 'verifyNisn']);
Route::get('/check-nisn-exists', [FormAlumniController::class, 'checkNisnExists']);


Route::get('/formalumni', [FormAlumniController::class, 'formalumni'])->name('menu.formalumni');
Route::post('/formalumni/store', [FormAlumniController::class, 'store'])->name('formalumni.store');


Route::get('/statistik', [StatistikController::class, 'statistik'])->name('menu.statistik');


Route::get('/lowongan', [LowonganKerjaController::class, 'infolowongan'])->name('infolowongan');  
Route::get('/lowongan/{id}', [LowonganKerjaController::class, 'show'])->name('menu.detail-lowongan');


Route::get('/infoalumni', [InfoAlumniController::class, 'infoalumni'])->name('infoalumni');

