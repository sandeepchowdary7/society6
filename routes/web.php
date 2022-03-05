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

Route::get('/marco-fine-arts', [App\Http\Controllers\ApiController::class, 'getMarcosFineArts'])->name('marco-fine-arts');
Route::get('/dream-junction', [App\Http\Controllers\ApiController::class, 'getDreamJunctions'])->name('dream-junction');
