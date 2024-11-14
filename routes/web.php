<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//ajax crud started
Route::get('/index', [CategoriController::class, 'index'])->name('index');
Route::get('/edite/item/{id}', [CategoriController::class, 'edite'])->name('edite');
Route::get('/delete/item/{id}', [CategoriController::class, 'delete'])->name('delete');
Route::post('/update/item/{id}', [CategoriController::class, 'update'])->name('update');
Route::post('store/categori/', [CategoriController::class, 'store'])->name('store');


