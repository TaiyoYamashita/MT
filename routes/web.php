<?php
URL::forceScheme('https');

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\EveryController;
use App\Http\Controllers\SavedController;
use App\Http\Controllers\PostedController;
use App\Http\Controllers\FavoriteController;
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

Route::get('/', [TemplateController::class, 'top']);
Route::get('/register', [TemplateController::class, 'register']);

Route::controller(TemplateController::class)->middleware(['auth'])->group(function () {
    Route::get('/everybody', 'everybody')->name('everybody');
    Route::get('/genre', 'genre')->name('genre');
    Route::get('/history', 'history')->name('history');
    Route::get('/favorite', 'favorite')->name('favorite');
    Route::get('/saved', 'saved')->name('saved');
    Route::get('/posted', 'posted')->name('posted');
    Route::get('/paper.cpp', 'paper');
});

Route::controller(EveryController::class)->middleware(['auth'])->group(function () {
    Route::get('/every/{post}', 'show');
    Route::get('/every/{post}/create', 'create');
    Route::post('/every/{post}/favorite', 'register');
});

Route::controller(SavedController::class)->middleware(['auth'])->group(function () {
    Route::get('/saved/create', 'create');
    Route::get('/saved/{post}', 'show');
    Route::get('/save.css', 'save');
    Route::get('/saved/{post}/edit', 'edit');
    Route::post('/saved', 'store');                 //新規文章の保存
    Route::put('/saved/{post}', 'update');          //保存した文章の編集
    Route::put('/saved/{post}/post', 'post');       //保存した文章の投稿
    Route::delete('/saved/{post}', 'delete');
});

Route::controller(PostedController::class)->middleware(['auth'])->group(function () {
   Route::get('/posted/{post}', 'show'); 
   Route::put('/posted/{post}/save', 'save');
});

Route::controller(FavoriteController::class)->middleware(['auth'])->group(function () {
    Route::get('/favorite/{favorite}', 'show');
    Route::delete('/favorite/{favorite}', 'delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/profile', 'detail')->name('profile.detail');
    Route::get('/profile/edit', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});



require __DIR__.'/auth.php';
