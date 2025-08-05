<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecretNoteController;
use App\Http\Controllers\PasswordRequestController;
use App\Http\Controllers\AdminPasswordRequestController;


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/password-requests', [AdminPasswordRequestController::class, 'index'])->name('admin.password.requests');
    Route::post('/admin/password-requests/{id}/reset', [AdminPasswordRequestController::class, 'reset'])->name('admin.password.reset');
    Route::delete('/admin/password-requests/{id}', [AdminPasswordRequestController::class, 'destroy'])->name('admin.password.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/user/password', [ProfileController::class, 'updatePassword'])->name('password.update');

    // note
    Route::get('/notes/create', [SecretNoteController::class, 'create'])->name('notes.create');
    Route::post('/notes', [SecretNoteController::class, 'store'])->name('notes.store');
    Route::get('/notes/{uuid}/created', [SecretNoteController::class, 'created'])->name('notes.created');
    Route::get('/notes/history', [SecretNoteController::class, 'history'])->name('notes.history');
    Route::delete('/notes/history/{uuid}', [SecretNoteController::class, 'destroyLog'])->name('notes.history.destroy');
});

// Publik
Route::get('/note/{uuid}', [SecretNoteController::class, 'show'])->name('notes.show');
Route::post('/note/{uuid}', [SecretNoteController::class, 'access'])->name('notes.access');

Route::get('/request-password', [PasswordRequestController::class, 'create'])->name('password.request.form');
Route::post('/request-password', [PasswordRequestController::class, 'store'])->name('password.request.store');


require __DIR__.'/auth.php';
