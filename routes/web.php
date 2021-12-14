<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\PracticeController;
use \App\Http\Controllers\ReferenceController;
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

Route::get('/', [HomeController::class,'index'])->name('home');

    Route::get('/home/{nbDays}', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/domain/{id}', [DomainController::class, 'index']);
    Route::get('/practice/{id}', [PracticeController::class, 'show']);
    Route::resource('references', ReferenceController::class);
});

require __DIR__.'/auth.php';
