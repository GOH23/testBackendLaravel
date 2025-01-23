<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkersController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/workers', [WorkersController::class,'index']);

