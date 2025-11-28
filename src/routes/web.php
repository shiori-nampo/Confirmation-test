<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

// 管理画面（ログイン必須）
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ContactController::class, 'dashboard']);
});

// ログイン・新規登録画面（ゲスト用）
Route::get('/register',function() {
    return view('auth.register');})->name('register');
Route::get('/login',function() {
    return view('auth.login');})->name('login');

// ゲスト用
Route::get('/',[ContactController::class,'index']);


Route::post('/confirm',[ContactController::class,'confirm']);