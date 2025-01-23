<?php

use App\Http\Controllers\WorkerDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkersController;
Route::post('/workers', [WorkersController::class,'store']);
Route::post('/workers/addchild', [WorkersController::class,'addParent']);
Route::post('/workers/worker', [WorkerDataController::class,'addWorker']);