<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashBoardController::class, 'dashboard'])->name('dashboard');

    Route::resource('/appointments', AppointmentController::class);
    Route::resource('/parents', ParentController::class);
    Route::resource('/childs', ChildController::class)->except('show');
    Route::resource('/records', RecordController::class)->except('destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
