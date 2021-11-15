<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\MigrateController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::get('/accounts', [AccountController::class, 'index'])->name('accounts');
Route::post('/accounts',[AccountController::class, 'store']);


Route::get('/deposit', [DepositController::class, 'index'])->name('deposit');
Route::post('/deposit', [DepositController::class, 'update']);


Route::get('/transfer', [TransferController::class, 'index'])->name('transfer');
Route::post('/transfer', [TransferController::class, 'transfer']);

Route::get('/migrate', [MigrateController::class, 'index'])->name('migrate');
Route::post('/migrate', [MigrateController::class, 'migrate']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/transactions',[TransactionController::class, 'index'])->name('transactions');
Route::post('/transactions',[TransactionController::class, 'store']);


Route::get('/home',function(){
    return view('home');
})->name('home');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'retrieve']);

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);




