<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
// Login Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
// Logout Route
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Routes
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('shifts', ShiftController::class);
    Route::resource('times', TimeController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('items', ItemController::class);
    Route::resource('days', DayController::class);
    Route::resource('menu_items', MenuItemController::class);
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

    Route::get('/predict/snacks', [PredictionController::class, 'predictSnacks'])->name('predict.snacks');
    Route::get('/predict/lunch', [PredictionController::class, 'predictLunch'])->name('predict.lunch');
});
