<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;

Route::get('/', function () {
    return 'QOFFEE ONLINE 🔥';
});

Route::get('/queue', function () {
    return view('queue');
});

Route::post('/queue/store', [QueueController::class, 'store']);

Route::get('/success/{id}', [QueueController::class, 'success']);

Route::get('/admin', [QueueController::class, 'dashboard']);

Route::get('/admin/status/{id}/{status}', [QueueController::class, 'updateStatus']);

Route::get('/admin/delete/{id}', [QueueController::class, 'delete']);

Route::get('/receipt/{id}', [QueueController::class, 'receipt']);
