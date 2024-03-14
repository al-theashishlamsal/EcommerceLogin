<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorRequestController;

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

// Route for the login page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Protected routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.index');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route to the backend.index view, accessible only to authenticated users
    Route::get('/backend', function () {
        return view('backend.index');
    })->name('backend.index');
});

Route::post('/logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');

// Route for vendor registration
Route::get('/register/vendor', function () {
    return view('auth.register', ['type' => 'vendor']);
})->name('vendor.register');

// Route for customer registration
Route::get('/register/customer', function () {
    return view('auth.register', ['type' => 'customer']);
})->name('customer.register');

Route::get('/pending-vendor-requests', [VendorRequestController::class, 'pending'])->name('pending-vendor-requests');
Route::get('/approved-vendor-requests', [VendorRequestController::class, 'approved'])->name('approved-vendor-requests');




// Authentication-related routes
require __DIR__.'/auth.php';
