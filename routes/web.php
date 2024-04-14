<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiografyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'Home']);
Route::get('/biografy', [BiografyController::class, 'Biografy']);
Route::get('/galery', [GaleryController::class, 'Galery']);
Route::get('/tentang', [AboutController::class, 'About']);
Route::get('/login', [AuthController::class, 'Login']);
Route::get('/register', [AuthController::class, 'Register']);
Route::get('/kontak', [ContactController::class, 'Contact']);
Route::get('/dashboard', function () {
    return view('superadmin.dashboard');
});
