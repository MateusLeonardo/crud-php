<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('produtos', ProdutoController::class);
