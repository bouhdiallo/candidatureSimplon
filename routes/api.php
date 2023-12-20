<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\CandidatureController;

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

//crud formation par un administrateur
Route::get('formation/create', [FormationController::class, 'store']);//ajout formation
Route::put('formation/update/{formation}', [FormationController::class, 'update']);//modifier formation
Route::delete('formation/{simplon}', [FormationController::class, 'delete']);//supprimmer formation

//enregistrer candidature
Route::get('candidature/create', [CandidatureController::class, 'store']); //ajout candidature
Route::get('candidature/liste', [CandidatureController::class, 'index']); //liste de tous les candidatures

Route::post('candidature/statut/{candidature}', [CandidatureController::class, 'statut']); //accepter ou refuser une candidature


 Route::get('candidature/liste/accepter', [CandidatureController::class, 'candidatureAccepter']); //liste des candidatures accepter
 Route::get('candidature/liste/refuser', [CandidatureController::class, 'candidatureRefuser']); //liste des candidatures refuser


// admin controller
Route::post('adminregister', [AdminController::class, 'adminregister'])->name('adminregister');
Route::post('adminlog', [AdminController::class, 'adminlog'])->name('adminlog');

Route::view('adminlog', 'Admin/login')->name('adminlog');


Route::group(['middleware' => 'admin:admin-api'], function () {
    Route::post('adminlogout', [AdminController::class, 'adminlogout'])->name('adminlogout');
    Route::post('me',[AdminController::class,  'me']);
});
    

//user controller
Route::post('userregister', [UserController::class, 'userregister'])->name('userregister');
Route::post('userlog', [UserController::class, 'userlog'])->name('userlog');

Route::group(['middleware' => 'auth:user-api'], function () {
    Route::post('userlogout', [Usercontroller::class, 'userlogout'])->name('userlogout');
    Route::post('userme',[Usercontroller::class,  'me']);
});