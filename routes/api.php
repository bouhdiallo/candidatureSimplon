<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('adminregister', [AdminController::class, 'adminregister'])->name('adminregister');
Route::post('adminlog', [AdminController::class, 'adminlog'])->name('adminlog');

Route::view('adminlog', 'Admin/login')->name('adminlog');


Route::group(['middleware' => 'admin:admin-api'], function () {
    Route::post('adminlogout', [AdminController::class, 'adminlogout'])->name('adminlogout');
    Route::post('me',[AdminController::class,  'me']);
});





Route::group(['middleware' => 'auth:user-api'], function () {
    Route::post('adminlogout', [AdminController::class, 'adminlogout'])->name('adminlogout');
    Route::post('me',[AdminController::class,  'me']);
});