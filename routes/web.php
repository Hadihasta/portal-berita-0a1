<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/{slug}', [NewsController::class, 'category'])->name('news.category');
// Route::get('/{slug}', [NewsController::class, 'category'])->name('name.category');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
