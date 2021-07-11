<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('form-detail/{id}',[\App\Http\Controllers\FormController::class,'showForm']);
Route::get('get-forms',[\App\Http\Controllers\FormController::class,'getForms']);
Route::post('save-form',[\App\Http\Controllers\FormController::class,'saveForm'])->name('save.form');
Route::post('update-form/{id}',[\App\Http\Controllers\FormController::class,'updateForm'])->name('update.form');

