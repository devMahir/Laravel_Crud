<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentControler;
use App\Http\Controllers\HomeControler;

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


Route::get('/', [StudentControler::class, 'welcome'])->name('welcome');

Route::get('create', [StudentControler::class, 'create'])->name('create');

Route::post('create', [StudentControler::class, 'store'])->name('store');

Route::get('edit/{id}', [StudentControler::class, 'edit'])->name('edit');

Route::post('update/{id}', [StudentControler::class, 'update'])->name('update');

Route::delete('delete/{id}', [StudentControler::class, 'delete'])->name('delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
