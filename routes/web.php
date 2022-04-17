<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;

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

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/Register', [UserController::class, 'register'])->name('register');
Route::post('/Register', [UserController::class, 'sign_up'])->name('users.signup');
Route::get('/Form', [TicketController::class, 'form'])->name('form');
Route::post('/Form', [TicketController::class, 'save'])->name('ticket.save');
