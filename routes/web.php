<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('landing_page');
});
Route::get('/dash', function () {
    return view('dashboard');
})->middleware(['isAdmin'])->name('dashboard');
Auth::routes();

Route::get('/home',function () {
    return view('landing_page');
})->name('home');

//trips start --------------------------
Route::resource('trips', TripController::class)->middleware('isAdmin');
//trips end ----------------------------

//category start ----------------------------
Route::resource('categories', CategoryController::class)->middleware('isAdmin');
Route::get('/categories/view/{id}', [CategoryController::class, 'view'])->name('categoties');
//category end ------------------------------

//dashboard start----------------------------
Route::get('/dash',[DashboardController::class, 'index'] )->middleware(['isAdmin'])->name('dashboard');
//dashboard end----------------------------


//guide start----------------------------
Route::resource('/guides', GuideController::class)->middleware(['auth', 'isAdmin']);
//guide end----------------------------
