<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about-us', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/services', [App\Http\Controllers\ServicesController::class, 'index'])->name('services');
Route::get('/contact-us', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/our-work', [App\Http\Controllers\PortfolioController::class, 'index'])->name('our-work');
Route::get('/trendy-updates', [App\Http\Controllers\BlogController::class, 'index'])->name('trendy-updates');
Route::get('/team', [App\Http\Controllers\TeamController::class, 'index'])->name('team');
Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
