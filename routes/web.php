<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('landing_page.index');
})->name('home');
Route::get('/about', function() {
    return view('landing_page.about');
})->name('about');
Route::get('/services', function() {
    return view('landing_page.services');
})->name('services');
Route::get('/pricing', function() {
    return view('landing_page.pricing');
})->name('pricing');
Route::get('/cars', function() {
    return view('landing_page.car');
})->name('cars');
Route::get('/blog', function() {
    return view('landing_page.blog');
})->name('blog');
Route::get('/contact', function() {
    return view('landing_page.contact');
})->name('contact');
Route::get('/sign-in', function() {
    return view('landing_page.signin');
})->name('sign-in');
Route::get('/sign-up', function() {
    return view('landing_page.signup');
})->name('sign-up');


// admin
Route::get('/dashboard', function() {
    return view('admin.index');
})->name('dashboard');
Route::resource('/vehicles', VehicleController::class);
Route::resource('/admins', AdminController::class);
