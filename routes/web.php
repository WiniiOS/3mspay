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

Route::get('/', [UserController::class, 'index'])->name('login');

Route::get('/Register', [UserController::class, 'register'])->name('register');

Route::get('/Form', [UserController::class, 'form'])->name('form');

Route::get('/Logout', [UserController::class, 'logout']);

Route::get('/Ticket/{reference}' , [UserController::class,"show_hidden"])->name('show_hidden');

Route::post('/', [UserController::class, 'singin'])->name('signin');

Route::post('/Register', [UserController::class, 'sign_up'])->name('signup');

Route::post('/Form', [UserController::class, 'update_user'])->name('update.user');

Route::get('/Users', [UserController::class, 'all_users']);

Route::post('/Pay', [UserController::class,"pay"])->name('pay');



