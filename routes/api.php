<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DbController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('add',[DbController::class ,'store'])->name('add');
Route::get('get-api/{id}',[DbController::class ,'getapi'])->name('get-api');
Route::get('getdata',[DbController::class ,'getAll'])->name('getdata');
Route::post('postlogin',[DbController::class ,'postLogin'])->name('postlogin');
Route::post('update/{id}',[DbController::class ,'update'])->name('update');
Route::get('delete/{id}',[DbController::class ,'destroy'])->name('delete');