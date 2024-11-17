<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PurchaseController;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [ContentController::class, 'home'])->name('page.home');
Route::get('about', [ContentController::class, 'about'])->name('page.about');
Route::get('books', [ContentController::class, 'books'])->name('page.books');
Route::get('events', [EventController::class, 'index'])->name('page.events');
Route::get('training', [ContentController::class, 'training'])->name('page.training');
Route::get('training/{type?}/{course?}/{session?}', [ContentController::class, 'course'])->name('page.training.course');
Route::get('eagles-network', [ContentController::class, 'eaglesnetwork'])->name('page.eaglesnetwork');
Route::get('seer-school', [ContentController::class, 'seerschool'])->name('page.landing.seerschool');
Route::post('auth/attempt', [AuthController::class, 'attempt'])->name('attempt');
Route::get('auth/token/{token}', [AuthController::class, 'login'])->name('login.user');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('purchase/{price_id}', [PurchaseController::class, 'purchase'])->name('purchase');

Route::get('welcome', [ContentController::class, 'welcome'])->name('welcome');
