<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SugangController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/sugang', [SubjectController::class, 'index'])->name('index');

Route::middleware(['auth:sanctum', 'verified'])->get('/subjects', [SubjectController::class, 'index2'])->name('index2');

Route::middleware(['auth:sanctum', 'verified'])->get('/createSub', [SubjectController::class, 'index3'])->name('index3');

Route::middleware(['auth:sanctum', 'verified'])->post('/subject/create', [SubjectController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->post('/subject/update/{subId}', [SubjectController::class, 'update']);

Route::middleware(['auth:sanctum', 'verified'])->delete('/subject/delete/{subId}', [SubjectController::class, 'destroy']);

Route::middleware(['auth:sanctum', 'verified'])->get('/sugang/{subId}', [SugangController::class, 'sugang_check']);
