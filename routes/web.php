<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiaryController;

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
    return view('welcome');
});

Route::get('    /dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('diary')->group(function () {
    Route::get('/', [DiaryController::class, 'index'])->name('diary');
    Route::get('/detail/{id}', [DiaryController::class, 'detail'])->name('diary.detail');
    Route::get('/edit/{id}', [DiaryController::class, 'edit'])->name('diary.edit');
    Route::get('/new', [DiaryController::class, 'new'])->name('diary.new');

    Route::patch('/update', [DiaryController::class, 'update'])->name('diary.update');
    Route::post('/create', [DiaryController::class, 'create'])->name('diary.create');
    Route::delete('/remove/{id}', [DiaryController::class, 'remove'])->name('diary.remove');
});

require __DIR__ . '/auth.php';
