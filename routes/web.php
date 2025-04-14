<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProfileController;


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

Route::get('/', fn () => view('welcome'))->name('home');

// Authentification
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');

    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');

    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/employee/dashboard', fn () => view('employee.dashboard'))->name('employee.dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
        Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
        Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
        Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');

        Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
        Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
        Route::put('/activities/{activity}', [ActivityController::class, 'update'])->name('activities.update');
        Route::delete('/activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');
    });
    
    Route::prefix('client')->name('client.')->group(function () {
        Route::get('/activities', [ActivityController::class, 'homeActivities'])->name('activities.index');
        Route::get('/activity/{id}', [ActivityController::class, 'show'])->name('activities.detaills');
        Route::get('/home', [RoomController::class, 'home'])->name('client.home');
        Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show');
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    });
    
});
