<?php

use App\Http\Controllers\BandController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/bands', [BandController::class, 'index'])->name('bands');
        Route::get('/bands/create', [BandController::class, 'create']);
        Route::get('/bands/edit/{band}', [BandController::class , 'edit'])->name('band.edit');
        Route::patch('/bands/{band}', [BandController::class, 'update'])->name('band.update');
        Route::post('/bands', [BandController::class, 'store']);
        Route::get('/bands/{band}', [BandController::class, 'show']);
        Route::get('/bands/search/{searchKey}', [BandController::class, 'search']);
        Route::post('/bands/toggle/{band}', [BandController::class, 'toggle']);
        Route::delete('/bands/{band}',[BandController::class, 'destroy']);

        Route::get('/bands/email/{band}', [BandController::class, 'email']);
    });
});
