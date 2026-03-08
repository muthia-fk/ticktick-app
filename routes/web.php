<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;   // <--- tambahkan ini
use App\Http\Middleware\RedirectIfAuthenticated;

// Halaman welcome default
Route::get('/', function () {
    return view('welcome');
});

// Group route login dengan middleware guest (RedirectIfAuthenticated)
Route::middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Halaman home (hanya bisa diakses kalau sudah login)
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

// Route logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Logout sukses!');
})->name('logout');

// CRUD Task (hanya bisa diakses kalau sudah login)
Route::resource('tasks', TaskController::class)->middleware('auth');