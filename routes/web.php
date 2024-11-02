<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\EventController;

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
