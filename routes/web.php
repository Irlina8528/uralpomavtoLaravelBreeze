<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\FreekassaController;
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

Route::middleware(['auth', 'verified', 'check.user.type:user'])->group(function () {
    Route::get('/orders', [OrderController::class, 'create'])->name('orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('show-order');
    Route::get('/new-orders', function () {return view('user.new-orders');})->name('user-new-orders');
    Route::post('/save', [OrderController::class, 'store'])->name('save-user-new-orders');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/company', [ProfileController::class, 'company_update'])->name('profile.company_update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('user-feedback');
});

Route::middleware(['auth', 'verified', 'check.user.type:manager'])->group(function () {
    Route::get('/contact-form', [ManagerController::class, 'contactFormShow'])->name('manager-contact-form');
    Route::delete('/contact-form/{id}', [ManagerController::class, 'contactFormDestroy'])->name('manager-contact-form-dell');
    Route::get('/manager/orders', [ManagerController::class, 'ordersShow'])->name('manager-orders');
    Route::get('/manager/orders/{order}', [ManagerController::class, 'orderShow'])->name('manager-order');
    Route::patch('/manager/orders/{id}', [ManagerController::class, 'orderUpdate'])->name('manager-order-update');
    Route::delete('/manager/orders/{id}', [ManagerController::class, 'orderDelete'])->name('manager-order-delete');
    Route::get('/manager/orders/user/{user_id}', [ManagerController::class, 'orderShowUser'])->name('manager-order-user');
});

Route::middleware(['auth', 'verified', 'check.user.type:administrator'])->group(function () {
    Route::get('/users', [AdministratorController::class, 'createUsers'])->name('administrator-users');
    Route::post('/users/{id}', [AdministratorController::class, 'updateUsers'])->name('administrator-users-update');
    Route::get('/drivers', [AdministratorController::class, 'createDrivers'])->name('administrator-drivers');
    Route::post('/drivers', [AdministratorController::class, 'createDriver'])->name('administrator-drivers-create');
    Route::get('/transports', [AdministratorController::class, 'createTransports'])->name('administrator-transports');
    Route::post('/transports', [AdministratorController::class, 'createTransport'])->name('administrator-transport-create');
});



Route::get('/contacts', function () {return view('contacts');})->name('contacts');

Route::get('/about', [FeedbackController::class, 'create'])->name('about');

Route::get('/calculate-cost', function () {return view('calculate-cost');})->name('calculate-cost');


//Оплата
Route::get('/notification', [FreekassaController::class, 'notification'])->name('notification');
Route::get('/success', [FreekassaController::class, 'success'])->name('success');
Route::get('/failure', [FreekassaController::class, 'failure'])->name('failure');


require __DIR__.'/auth.php';
