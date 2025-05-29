<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use App\Models\Course;

// use App\Http\Controllers\JunkController;

// use App\Models\User;


Route::get('/', [ContentController::class, 'home'])->name('page.home');
Route::get('about', [ContentController::class, 'about'])->name('page.about');
Route::get('books', [ContentController::class, 'books'])->name('page.books');
Route::get('events', [EventController::class, 'index'])->name('page.events');
Route::get('event/{id}', [EventController::class, 'show'])->name('page.event.detail');

Route::get('training', [ContentController::class, 'training'])->name('page.training');
Route::get('training/{type?}/{course?}/{session?}', [ContentController::class, 'course'])->name('page.training.course');
Route::get('eagles-network', [ContentController::class, 'eaglesnetwork'])->name('page.eaglesnetwork');
// Route::get('seer-school', [ContentController::class, 'seerschool'])->name('page.landing.seerschool');
Route::post('auth/attempt', [AuthController::class, 'attempt'])->name('attempt');
Route::get('auth/token/{token}', [AuthController::class, 'login'])->name('login.user');


Route::post('purchase', [PurchaseController::class, 'singlePurchase'])->name('singlePurchase');
Route::get('purchase/{price_id}', [PurchaseController::class, 'show'])->name('page.landing.payment');
Route::get('welcome-to-the-course', [ContentController::class, 'success'])->name('page.success');
Route::get('payment-cancelled', [ContentController::class, 'cancel'])->name('page.cancel');




// This is for the import of data
// Route::get('csv', function () {
//     $insert = new JunkController;

//     foreach($insert->courses() as $course)
//     {

//         $insert->read($course);
//     }
//     return view('insert',['courses'=> $insert->courses()]);
// });
// Route::post('csv', [JunkController::class, 'read'])->name('csv.upload');
