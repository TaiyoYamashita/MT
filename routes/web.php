<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MTController;
use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [MTController::class, 'top']);
Route::get('/everybody', [MTController::class, 'everybody']);
Route::get('/genre', [MTController::class, 'genre']);
Route::get('/history', [MTController::class, 'history']);
Route::get('/favorite', [MTController::class, 'favorite']);
Route::get('/saved', [MTController::class, 'saved']);
Route::get('/posted', [MTController::class, 'posted']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
