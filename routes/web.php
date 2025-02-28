<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DiaryController;


Route::get('/diaries', [DiaryController::class, 'index'])->name('diaries.index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/', function () {
    return view('home', [
        'diaries' => Auth::check() ? Auth::user()->diaries()->latest()->take(5)->get() : []
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/diary', [DiaryController::class, 'index'])->name('diary');
    Route::get('/diaries/create', [DiaryController::class, 'create'])->name('diaries.create');
    Route::post('/diaries', [DiaryController::class, 'store'])->name('createDiaries');
    Route::get('/diaries/{id}/edit', [DiaryController::class, 'edit'])->name('diaries.edit');
    Route::patch('/diaries/{id}', [DiaryController::class, 'update']);
    Route::delete('/diaries/{id}', [DiaryController::class, 'destroy'])->name('diaries.destroy');
});

require __DIR__.'/auth.php';


