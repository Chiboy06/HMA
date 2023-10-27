<?php

use App\Models\Appointment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;

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

Route::get('/', function () {
    return view('index');
})->name('/');

// Route::get('/login', function () {
//     return view('loginForm');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/loginForm', [UserController::class, 'showLogin'])->middleware('guest')->name('loginForm');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/appointment', [UserController::class, 'showAppointment'])->middleware('auth')->name('appointment');
Route::get('/registerForm', [UserController::class, 'showregister'])->middleware('guest')->name('registerForm');
Route::get('/appointments', function() {
    // $appointments = Appointment::all();
    $appointments = [];

    if (auth()->check()) {
        $appointments = auth()->user()->usersAppointments()->orderBy('bookingDate', 'asc')->get();
    };

    return view('view-bookings',[
        'bookings' => $appointments,
    ]);
})->middleware('auth')->name('view.appointments');
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::post('/create-appointments', [AppointmentController::class, 'createAppointment'])->middleware('auth');
Route::delete('/bookings/{id}', [AppointmentController::class, 'deleteAppointment'])->name('deleteAppointment');
Route::get('/filterAppointments', [AppointmentController::class, 'filterAppointments'])->name('filterAppointment');
Route::get('/editAppointment/{id}', [AppointmentController::class, 'showEditPage'])->name('editAppointment')->middleware('auth');
Route::put('/editAppointment/{id}', [AppointmentController::class, 'updateAppointment'])->name('editAppointments')->middleware('auth');



// Route::get('/', 'HomeController@index')->name('home');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
