<?php

use App\Http\Controllers\MaintenanceCheckController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/maintenance/create', [MaintenanceCheckController::class, 'create'])
    ->name('maintenance.create');

Route::post('/maintenance/store', [MaintenanceCheckController::class, 'store'])
    ->name('maintenance.store');

Route::get('/maintenance/{id}/result', [MaintenanceCheckController::class, 'result'])
    ->name('maintenance.result');
