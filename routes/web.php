<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\guide_trips;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\GuideTripController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TripImagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
return redirect()->route('home');
});
Route::get('/dash', function () {
    return view('dashboard');
})->middleware(['isAdmin'])->name('dashboard');
Auth::routes();

Route::get('/home',function () {
    return view('landing_page');
})->name('home');
