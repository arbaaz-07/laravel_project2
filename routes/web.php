<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/hey', [App\Http\Controllers\HomeController::class, 'hey'])->name('hey');
Route::get('/add', [App\Http\Controllers\HomeController::class, 'add'])->name('add');

// Route::get('upload-image', [HomeController::class, 'index']);
Route::post('/save', [HomeController::class, 'save']);

Route::get('/delete/{id}', [HomeController::class,'delete']);
Route::get('/edit/{id}', [HomeController::class,'edit']);
Route::post('/update/{id}', [HomeController::class,'update']);
