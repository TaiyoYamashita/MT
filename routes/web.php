<?php
URL::forceScheme('https');

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\EveryController;
use App\Http\Controllers\SavedController;
use App\Http\Controllers\PostedController;
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
    Route::get('/template.css', 'template');
    Route::get('/everybody', 'everybody')->name('everybody');
    Route::get('/genre', 'genre')->name('genre');
    Route::get('/history', 'history')->name('history');
    Route::get('/favorite', 'favorite')->name('favorite');
    Route::get('/saved', 'saved')->name('saved');
    Route::get('/posted', 'posted')->name('posted');
});

Route::controller(EveryController::class)->middleware(['auth'])->group(function () {
    Route::get('/every/{post}', 'show');
    Route::get('/every/{post}/create', 'create');
});

Route::controller(SavedController::class)->middleware(['auth'])->group(function () {
    Route::get('/saved/create', 'create');
    Route::get('/saved/{post}', 'show');
    Route::get('/saved/{post}/edit', 'edit');
    Route::post('/saved', 'store');                 //新規文章の保存
    Route::put('/saved/{post}', 'update');          //保存した文章の編集
    Route::put('/saved/{post}/post', 'post');       //保存した文章の投稿
    Route::delete('/saved/{post}', 'delete');
});

Route::controller(PostedController::class)->group(function () {
   Route::get('/posted/{post}', 'show'); 
   Route::put('/posted/{post}/save', 'save');
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
