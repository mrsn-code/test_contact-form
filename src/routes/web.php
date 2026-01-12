<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);

Route::get('/admin', [AuthController::class, 'success'])->middleware('auth');

Route::get('/search', [AdminController::class, 'search']);
Route::get('/reset', [AdminController::class, 'reset']);
Route::get('/export', [AdminController::class, 'export']);
Route::get('/admin/{contact}', [AdminController::class, 'show']);
Route::delete('/delete', [AdminController::class, 'destroy']);