<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\MessagesController;
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
    Route::get('/manager/orders/user/{user_id}', [ManagerController::class, 'orderShowUser'])->name('manager-order-user');
});

Route::middleware(['auth', 'verified', 'check.user.type:administrator'])->group(function () {
    Route::get('/users', [AdministratorController::class, 'createUsers'])->name('administrator-users');
    Route::post('/users/{id}', [AdministratorController::class, 'updateUsers'])->name('administrator-users-update');
    Route::get('/drivers', [AdministratorController::class, 'createDrivers'])->name('administrator-drivers');
    Route::post('/drivers', [AdministratorController::class, 'createDriver'])->name('administrator-drivers-create');
    Route::post('/drivers/{id}', [AdministratorController::class, 'updateDriver'])->name('administrator-drivers-update');
    Route::post('/drivers/delete/{id}', [AdministratorController::class, 'deleteDriver'])->name('administrator-drivers-delete');

    Route::post('/transports/{id}', [AdministratorController::class, 'updateTransport'])->name('administrator-transport-update');
    Route::post('/transports/delete/{id}', [AdministratorController::class, 'deleteTransport'])->name('administrator-transport-delete');
    Route::get('/transports', [AdministratorController::class, 'createTransports'])->name('administrator-transports');
    Route::post('/transports', [AdministratorController::class, 'createTransport'])->name('administrator-transport-create');
});



Route::get('/contacts', function () {return view('contacts');})->name('contacts');

Route::get('/about', [FeedbackController::class, 'create'])->name('about');

Route::get('/calculate-cost', function () {return view('calculate-cost');})->name('calculate-cost');

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', [MessagesController::class, 'index'])->name('messages');
    Route::get('create', [MessagesController::class, 'create'])->name('messages.create');
    Route::post('/', [MessagesController::class, 'store'])->name('messages.store');
    Route::get('{id}', [MessagesController::class, 'show'])->name('messages.show');
    Route::put('{id}', [MessagesController::class, 'update'])->name('messages.update');
    Route::post('del/{id}', [MessagesController::class, 'del'])->name('messages-del');
});

require __DIR__.'/auth.php';
