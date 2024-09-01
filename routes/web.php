<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;



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
// dashboard route
Route::get('/dash',[DashboardController::class, 'index'] )->middleware(['isAdmin'])->name('dashboard');

Auth::routes( [
    'verify' => true
]);

Route::get('/home',function () {
    return view('landing_page');
})->name('home');



//------------------------------ contact routes------------------------------------
Route::get('/contact',[EmailController::class,'contactForm']);
Route::post('/contactMail',[EmailController::class,'contact'])->name('contact')->middleware('verified');
//------------------------------ contact routes------------------------------------

