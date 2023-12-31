<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\VoteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/users', UserController::class);
Route::resource('/words', WordController::class);
Route::resource('/people', PeopleController::class);

Route::get('/sugestoes',  [WordController::class, 'create']);
Route::get('/concluido',  [WordController::class, 'sugestions-success']);

Route::get('/sorteio-palavra', [DraftController::class, 'words']);
Route::get('/sorteio-player', [DraftController::class, 'players']);

Route::get('/votacao', [VoteController::class, 'index']);
Route::post('/votacao', [VoteController::class, 'store'])->name('vote');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
