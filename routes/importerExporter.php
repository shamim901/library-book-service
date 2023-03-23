<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ImporterExporter\ExportController;
use App\Http\Controllers\ImporterExporter\ImportController;
use App\Http\Controllers\ImporterExporter\FileUploadController;
use App\Http\Controllers\ImporterExporter\PDFController;

use App\Http\Controllers\UsersController;


// excel importer routes
Route::get('/file-import',[ImportController::class,'importView'])->name('import-view');
Route::post('/import',[ImportController::class,'import'])->name('import');
Route::post('/import',[ImportController::class,'import'])->name('import');

//excel exporter
Route::get('/export-users',[ExportController::class,'exportUsers'])->name('export-users');
Route::get('/export-users-view',[ExportController::class,'exportUsersView'])->name('export-users-view');

// pdf generate
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

// file upload
Route::get('/file-upload-view', [FileUploadController::class, 'fileUploadView']);
Route::post('file-uploader', [FileUploadController::class, 'fileUploader'])->name('file-uploader');