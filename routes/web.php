<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return redirect()->route('home');
});

Route::get('/dash', function () {
return view('dashboard');
})->middleware(['isAdmin'])->name('dashboard');

Auth::routes();

Route::get('/home',[HomeController::class,'index'])->name('home');

//trips start --------------------------
Route::resource('trips', TripController::class)->middleware(['auth' , 'isAdmin']);
//trips end ----------------------------

//category start ----------------------------
Route::resource('categories', CategoryController::class)->middleware(['auth' , 'isAdmin']);
Route::get('/categories/view/{id}', [CategoryController::class, 'view'])->name('categoties');
//category end ------------------------------

//dashboard start----------------------------
Route::get('/dash',[DashboardController::class, 'index'] )->middleware(['isAdmin'])->name('dashboard');
//dashboard end----------------------------

//guide start----------------------------
Route::resource('/guides', GuideController::class)->middleware(['auth', 'isAdmin']);
//guide end----------------------------

//testimonials start----------------------------
Route::resource('testimonials', TestimonialController::class)->middleware(['auth' , 'isAdmin']);
//testimonials end----------------------------
