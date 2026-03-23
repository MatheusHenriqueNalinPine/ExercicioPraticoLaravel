<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImcController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/imc', [ImcController::class, 'index'])->name('imc.index');
Route::post('/imc/calculate', [ImcController::class, 'calculate'])->name('imc.calculate');
