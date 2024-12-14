<?php

use App\Http\Controllers\Ajax_2Controller;
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

// ajax_2 crude
Route::get('/index_2',[Ajax_2Controller::class, 'index_2'])->name('index_2');
Route::post('/ajax/store',[Ajax_2Controller::class, 'store'])->name('store');
Route::get('/ajax/edite/{id}',[Ajax_2Controller::class, 'edit'])->name('edit');
Route::post('/ajax/update/{id}',[Ajax_2Controller::class, 'update'])->name('update');
Route::get('/ajax/delete/{id}',[Ajax_2Controller::class, 'delete'])->name('delete');

