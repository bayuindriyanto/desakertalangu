<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AuthController;

Route::get('/', [GalleryController::class, 'index'])->name('fotos');


//admininstrator
// Route::resource('photos', PhotoController::class);
Route::get('photos', [PhotoController::class, 'index'])->name('photos.index');
Route::get('photos/create', [PhotoController::class, 'create'])->name('photos.create');
Route::post('photos', [PhotoController::class, 'store'])->name('photos.store');
Route::get('photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
Route::put('photos/{photo}', [PhotoController::class, 'update'])->name('photos.update');
Route::get('photos/{photo}', [PhotoController::class, 'show'])->name('photos.show');
Route::delete('photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');


//login register
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');