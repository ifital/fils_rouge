<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ces routes sont chargées par RouteServiceProvider et appartiennent au
| groupe "web". Elles incluent l'authentification, les dashboards, et
| la gestion des chambres pour l'admin.
|
*/

// Page d'accueil
Route::get('/', fn () => view('welcome'))->name('home');

// Authentification
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');

    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');

    Route::post('/logout', 'logout')->name('logout');
});

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {

    // Dashboards selon le rôle
    Route::get('/admin/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/employee/dashboard', fn () => view('employee.dashboard'))->name('employee.dashboard');
    Route::get('/client/home', fn () => view('client.home'))->name('client.home');

    // Gestion des chambres pour l'admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
        Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
        Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
        Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');
    });
});
