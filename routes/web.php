<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\RegisteredUserController;

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
});

Route::middleware(['auth'])->group(function() {
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::post('/purchase/{id}', [ProductController::class, 'purchase'])->name('purchase');


    Route::get('/earnings', [UserController::class, 'earnings'])->name('earnings');


    Route::get('/tree', [UserController::class, 'referralTree'])->name('tree');
});


require __DIR__.'/auth.php';

Route::get('/register/{referrer_id?}', function ($referrer_id = null) {
    if ($referrer_id) {
        Session::put('referrer_id', $referrer_id);
    }
    return redirect()->route('register');
});
