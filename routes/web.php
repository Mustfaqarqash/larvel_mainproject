<?php

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
