<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\JunkController;
use Illuminate\Http\Request;
use App\Models\User;


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


Route::post('purchase', [PurchaseController::class, 'singlePurchase'])->name('singlePurchase');
Route::get('purchase/{price_id}', [PurchaseController::class, 'show'])->name('page.landing.payment');


//Route::get('welcome', [ContentController::class, 'welcome'])->name('welcome');


Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('checkout/success', [PurchaseController::class, 'checkoutSuccess'])->name('checkout.success');
// Route::get('checkout/fail', [PurchaseController::class, 'checkoutFail'])->name('checkout.fail');

// Route::post('checkout/{price_id}', [PurchaseController::class, 'checkout'])->name('checkout');


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
