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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmailController;



Route::get('/', function () {
return redirect()->route('home');
});


Route::get('/dash',[DashboardController::class, 'index'] )->middleware(['isAdmin'])->name('dashboard');



//------------------------------ contact routes------------------------------------
Route::get('/contact',[EmailController::class,'contactForm']);
Route::post('/contactMail',[EmailController::class,'contact'])->name('contact')->middleware('verified');
//------------------------------ contact routes------------------------------------


Auth::routes( [
    'verify' => true
]);

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
Route::resource('testimonials', TestimonialController::class)->middleware(['auth' ]);
//testimonials end----------------------------

//testimonials start----------------------------
Route::resource('/users', UserController::class)->middleware(['auth', 'isAdmin']);
//testimonials end----------------------------


Route::get('/tripimages/create/{id}', [TripImagesController::class, 'create'])->name('tripimages.create');
Route::post('/tripimages/store/{id}', [TripImagesController::class, 'store'])->name('tripimages.store');

Route::get('/tripguide/create/{id}', [GuideTripController::class, 'create'])->name('tripguide.create');
Route::post('/tripguide/store/{id}', [GuideTripController::class, 'store'])->name('tripguide.store');


//tripimages start----------------------------
//Route::resource('/tripimages', TripImagesController::class)->middleware(['auth', 'isAdmin']);
//tripimages end----------------------------


    Route::get('/deatils' , function (){
    return view('dashboard/trips.show_userside');
});


Route::get('/tripimages/create/{id}', [TripImagesController::class, 'create'])->name('tripimages.create');
Route::post('/tripimages/store/{id}', [TripImagesController::class, 'store'])->name('tripimages.store');

Route::get('/tripguide/create/{id}', [GuideTripController::class, 'create'])->name('tripguide.create');
Route::post('/tripguide/store/{id}', [GuideTripController::class, 'store'])->name('tripguide.store');


//tripimages start----------------------------
//Route::resource('/tripimages', TripImagesController::class)->middleware(['auth', 'isAdmin']);
//tripimages end----------------------------
