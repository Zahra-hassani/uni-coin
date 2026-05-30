<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('/currency')->controller(CurrencyController::class)->group(function () {
        Route::view('/create','Currency.add');
        Route::post('/add','add');
    });
    Route::prefix('/dashboard')->controller(CurrencyController::class)->group(function () {
        Route::get('/currency','index');
        Route::get('/exchanger','exchanger');
    });
});
Route::get('/currency',[CurrencyController::class,'index']);

require __DIR__.'/auth.php';
