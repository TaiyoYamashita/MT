<?php
URL::forceScheme('https');

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\SavedController;
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

Route::controller(TemplateController::class)->group(function () {
    Route::get('/', 'top');
    Route::get('/template.css', 'template');
    Route::get('/everybody', 'everybody');
    Route::get('/genre', 'genre');
    Route::get('/history', 'history');
    Route::get('/favorite', 'favorite');
    Route::get('/saved', 'saved');
    Route::get('/posted', 'posted');
});

Route::controller(SavedController::class)->group(function () {
    Route::get('/saved/create', 'create');
    Route::get('/saved/{post}', 'show');
    Route::get('/saved/{post}/edit', 'edit');
    Route::post('/saved', 'store');
    Route::put('/saved/{post}', 'update');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
