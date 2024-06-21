<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentCarController;
use App\Http\Controllers\RentcarInfoController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/sign-up', [AuthController::class, 'signup'])->name('sign-up');
Route::post('/sign-up', [AuthController::class, 'createAccount'])->name('sign-up');

Route::middleware('auth')->group(function () {
    // Route::get('/admin/dashboard', function () {
    //     return 'Admin Dashboard';
    // })->name('admin.dashboard')->middleware('admin');
    Route::get('/dashboard', function() {
        return view('admin.index');
    })->name('dashboard')->middleware('admin');
    Route::resource('/vehicles', VehicleController::class)->middleware('admin');
    Route::resource('/admins', AdminController::class)->middleware('admin');
    Route::resource('/customers', CustomerController::class)->middleware('admin');
    Route::resource('/rentcar-info', RentcarInfoController::class)->middleware('admin');
    Route::get('/get-vehicle-unit-price/{id}', [RentcarInfoController::class, 'getVehicleUnitPrice'])->middleware('admin');


    Route::get('/customer/dashboard', function () {
        return 'Customer Dashboard';
    })->name('customer.dashboard')->middleware('customer');
    Route::resource('/carbook', RentCarController::class)->middleware('customer');
    Route::post('/carbook-check', [RentCarController::class, 'checkAvailableVehicle'])->name('checkVehicle')->middleware('customer');
});

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

Route::get('/cars-detail', function() {
    return view('landing_page.car-single');
})->name('cars-detail');


Route::get('/blog', function() {
    return view('landing_page.blog');
})->name('blog');
Route::get('/contact', function() {
    return view('landing_page.contact');
})->name('contact');
