<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/maintenance/create', function () {
    return view('maintenance.create');
})->name('maintenance.create');
