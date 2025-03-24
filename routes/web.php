<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DolgozoController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsekkolasController;
use App\Http\Controllers\KeresesController;


// Főoldal és Kapcsolat //

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('kapcsolat');
});;

// Hiba //

Route::get('/smtww', function () {
    return view('hiba');
});;

// Irányítópult //

Route::get('/dashboard', function () {
    return view('iranyitopult', );
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/api/chart-data', [ChartController::class, 'getChartData']);
Route::get('/get-job-titles', [WorkController::class, 'getJobTitles']);

// Nyilvántartás //

Route::post('/dolgozo', [DolgozoController::class, 'post'])->name('dolgozo.store');

Route::get('/registry', function () {
    return view('nyilvantartas');
})->middleware(['auth', 'verified'])->name('registry');

// Események //

Route::get('/events', function () {
    return view('esemenyek');
})->middleware(['auth', 'verified'])->name('events');

// Munkaidő //

Route::get('/worktime', function () {
    return view('munkaido');
})->middleware(['auth', 'verified'])->name('worktime');

// Bérszámfejtés //

Route::get('/payroll-calculation', [KeresesController::class, 'keres'])->middleware(['auth', 'verified'])->name('payroll-calculation');
Route::get('/dolgozo-kereso', [KeresesController::class, 'keres'])->name('dolgozo.kereso');
Route::get('/dolgozo/{id}/csekkolas', [DolgozoController::class, 'getDolgozoCsekkolas'])->name('dolgozo.csekkolas');

// Kamera //

Route::get('/camera', function () {
    return view('kamera');
})->middleware(['auth', 'verified'])->name('camera');
Route::post('/csekkolas', [CsekkolasController::class, 'csekkol']);

// Middleware //

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


