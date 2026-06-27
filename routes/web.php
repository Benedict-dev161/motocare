<?php

use App\Http\Controllers\MaintenanceCheckController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/maintenance/create', [MaintenanceCheckController::class, 'create'])
    ->name('maintenance.create');

Route::post('/maintenance/store', [MaintenanceCheckController::class, 'store'])
    ->name('maintenance.store');

Route::get('/maintenance/history', [MaintenanceCheckController::class, 'history'])
    ->name('maintenance.history');

Route::get('/maintenance/{id}/result', [MaintenanceCheckController::class, 'result'])
    ->name('maintenance.result');

Route::delete('/maintenance/{id}', [MaintenanceCheckController::class, 'destroy'])
    ->name('maintenance.destroy');

Route::patch('/maintenance/{id}/category/{category}', [MaintenanceCheckController::class, 'updateCategory'])
    ->name('maintenance.updateCategory');

Route::patch('/maintenance/{id}/current-km', [MaintenanceCheckController::class, 'updateCurrentKm'])
    ->name('maintenance.updateCurrentKm');
