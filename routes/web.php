<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DolgozoController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsekkolasController;
use App\Http\Controllers\BerszamfejtesController;


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
Route::get('/get-job-titles', [ChartController::class, 'getJobTitles']);

// Nyilvántartás //

Route::post('/dolgozo', [DolgozoController::class, 'post'])->name('dolgozo.store');

Route::get('/registry', function () {
    return view('nyilvantartas');
})->middleware(['auth', 'verified'])->name('registry');

// Dolgozós útvonalak //
Route::get('/dolgozok', [DolgozoController::class, 'index']);
Route::get('/dolgozok/{id}', [DolgozoController::class, 'show']);
Route::delete('/dolgozok/{id}', [DolgozoController::class, 'destroy'])->name('dolgozok.destroy');
Route::post('/dolgozok/update', [DolgozoController::class, 'update']);

// Események //

Route::get('/events', function () {
    return view('esemenyek');
})->middleware(['auth', 'verified'])->name('events');

// Munkaidő //

Route::get('/worktime', function () {
    return view('munkaido');
})->middleware(['auth', 'verified'])->name('worktime');

// Bérszámfejtés //

Route::get('/payroll-calculation', [BerszamfejtesController::class, 'keres'])->middleware(['auth', 'verified'])->name('payroll-calculation');
Route::get('/payroll-calculation/search', [BerszamfejtesController::class, 'keres'])->name('dolgozo.kereso');
Route::match(['get', 'post'], '/payroll-calculation/create', [BerszamfejtesController::class, 'create'])->name('payroll-calculation.create');

// Kamera //

Route::get('/camera', function () {
    return view('kamera');
})->middleware(['auth', 'verified'])->name('camera');
Route::post('/csekkolas', [CsekkolasController::class, 'csekkolas'])->name('csekkolas');

// Middleware //

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


