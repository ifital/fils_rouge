<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\ReserveActivityController;



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
Route::get('/contact', fn () => view('contact_us'))->name('contact');
Route::get('/about', fn () => view('about_us'))->name('about');

// Authentification
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {

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

        Route::get('/dashboard', [StatisticsController::class, 'index'])->name('statistics');

    });
    
    Route::prefix('client')->name('client.')->group(function () {
        // Routes pour les activités
        Route::get('/activities', [ActivityController::class, 'homeActivities'])->name('activities.index');
        Route::get('/activity/{id}', [ActivityController::class, 'show'])->name('activities.detaills');
        Route::post('/activities/reserve', [ReserveActivityController::class, 'store'])->name('activities.reserve.store');

        // Routes pour les chambres et profil
        Route::get('/home', [RoomController::class, 'home'])->name('home');
        Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show');
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        // Routes pour les réservations
        Route::get('/my-reservations', [ReservationController::class, 'index'])->name('reservations.index');
        Route::get('/reservation/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
        Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
        Route::patch('/reservation/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservation.cancel');

        // Routes pour les paiements
        Route::get('/reservation/{reservation}/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
        Route::get('/payment/success/{reservation}', [PaymentController::class, 'success'])->name('payment.success');
        Route::get('/payment/cancel/{reservation}', [PaymentController::class, 'cancel'])->name('payment.cancel');
        
    });
    
});

// Webhook Stripe (ne nécessite pas d'authentification)
Route::post('/stripe/webhook', [PaymentController::class, 'webhook'])->name('stripe.webhook');