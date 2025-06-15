<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\patientController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('patient.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/patient', [App\Http\Controllers\patientController::class, 'index'])->name('patient.index');
    Route::get('/patient/update', [patientController::class, 'edit'])->name('updatePatientForm');
    Route::put('/patient/update', [patientController::class, 'update'])->name('updatePatient');
});

// Routes متاحة للجميع (خارج الميدل وير)
Route::get('/care-giver/register', [App\Http\Controllers\careGiverController::class, 'create'])->name('careGiver.register');
Route::post('/care-giver/register', [App\Http\Controllers\careGiverController::class, 'store'])->name('careGiver.store');
Route::get('/care-giver/login', [App\Http\Controllers\careGiverController::class, 'login'])->name('careGiver.login');
Route::post('/care-giver/login', [App\Http\Controllers\careGiverController::class, 'authenticate'])->name('careGiver.authenticate');

Route::middleware('careGiver')->group(function () {
    Route::get('/care-giver', [App\Http\Controllers\careGiverController::class, 'index'])->name('careGiver.index');
    Route::get('/care-giver/logout', [App\Http\Controllers\careGiverController::class, 'logout'])->name('careGiver.logout');
    Route::get('/care-giver/update', [App\Http\Controllers\careGiverController::class, 'edit'])->name('careGiver.updateForm');
    Route::put('/care-giver/update', [App\Http\Controllers\careGiverController::class, 'update'])->name('careGiver.update');
});
Route::middleware('careGiver')->group(function () {
    Route::get('/care-giver/patient/heartRate', [App\Http\Controllers\patientController::class, 'heartRate'])->name('careGiver.patient.heartRate');
    Route::get('/care-giver/patient/temperature', [App\Http\Controllers\patientController::class, 'temperature'])->name('careGiver.patient.temperature');
    Route::get('/care-giver/patient/bloodPressure', [App\Http\Controllers\patientController::class, 'bloodPressure'])->name('careGiver.patient.bloodPressure');
    Route::get('/care-giver/patient/history', [App\Http\Controllers\patientController::class, 'history'])->name('careGiver.history');
});

Route::middleware('auth')->group(function () {
    Route::get('/patient/heartRate', [App\Http\Controllers\patientController::class, 'heartRate'])->name('patient.heartRate');
    Route::get('/patient/temperature', [App\Http\Controllers\patientController::class, 'temperature'])->name('patient.temperature');
    Route::get('/patient/bloodPressure', [App\Http\Controllers\patientController::class, 'bloodPressure'])->name('patient.bloodPressure');
    Route::get('/patient/history', [App\Http\Controllers\patientController::class, 'history'])->name('history');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

require __DIR__ . '/auth.php';
