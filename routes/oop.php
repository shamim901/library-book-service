<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OOPController;


Route::get('/method-over-loading',[OOPController::class,'methodOverLoading'])->name('method-over-loading');