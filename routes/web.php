<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('index');})->name('home');

Route::post('/contact-form', [ContactFormController::class, 'store'])->name('contact-form');

Route::get('/dashboard', function () {
    return view('layouts/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/orders', [OrderController::class, 'create'])->name('orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('show-order');
    Route::get('/new-orders', function () {return view('user.new-orders');})->name('user-new-orders');
    Route::post('/save', [OrderController::class, 'store'])->name('save-user-new-orders');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/company', [ProfileController::class, 'company_update'])->name('profile.company_update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/contacts', function () {return view('contacts');})->name('contacts');

Route::get('/about', function () {return view('about');})->name('about');

Route::get('/calculate-cost', function () {return view('calculate-cost');})->name('calculate-cost');

require __DIR__.'/auth.php';
