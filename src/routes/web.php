<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

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
    Route::get('/admin/admin', [ContactController::class, 'admin'])->name('admin');
    Route::get('/admin/search',[ContactController::class,'search'])->name('admin.search');
    Route::delete('/admin/delete/{id}',[ContactController::class,'destroy'])->name('admin.destroy');
});

// ログイン・新規登録画面
Route::get('/register',function() {
    return view('auth.register');})->name('register');
Route::get('/login',function() {
    return view('auth.login');})->name('login');

// ゲスト用
Route::get('/',[ContactController::class,'index'])->name('index');

Route::post('/back',[ContactController::class,'back']);

Route::post('/confirm',[ContactController::class,'confirm'])->name('confirm');

Route::post('/contacts/store',[ContactController::class,'store'])->name('contacts.store');

Route::get('/thanks',[ContactController::class,'thanks'])->name('thanks');