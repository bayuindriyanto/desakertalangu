<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\GalleryController;
// use App\Http\Controllers\GalleryVideoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VideoController;

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/', [GalleryController::class, 'index'])->name('fotos', 'videos');
// Route::get('/', [GalleryVideoController::class, 'index'])->name('videos');


//admininstrator
// Route::resource('photos', PhotoController::class);
Route::get('photos', [PhotoController::class, 'index'])->name('photos.index');
Route::get('photos/create', [PhotoController::class, 'create'])->name('photos.create');
Route::post('photos', [PhotoController::class, 'store'])->name('photos.store');
Route::get('photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
Route::put('photos/{photo}', [PhotoController::class, 'update'])->name('photos.update');
Route::get('photos/{photo}', [PhotoController::class, 'show'])->name('photos.show');
Route::delete('photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

Route::get('videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('videos/create', [VideoController::class, 'create'])->name('videos.create');
Route::post('videos', [VideoController::class, 'store'])->name('videos.store');
Route::get('videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::put('videos/{video}', [VideoController::class, 'update'])->name('videos.update');
Route::get('videos/{video}', [VideoController::class, 'show'])->name('videos.show');
Route::delete('videos/{video}', [VideoController::class, 'destroy'])->name('videos.destroy');
// Route::resource('videos', VideoController::class);

//login register
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');