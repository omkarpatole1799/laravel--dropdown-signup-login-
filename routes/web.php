<?php

use App\Http\Controllers\userController;

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
Route::view("/login","login");
Route::post("login_action",[userController::class,'login']);

Route::view("/signup","signup");
Route::post("signup_action",[userController::class,'signup']);

Route::get('viewall',[userController::class,'view_all_db']);
// Route::view('viewall','view_db');


Route::get('/dropdown',[userController::class,'dropdown_menu']);
Route::post('country',[userController::class,'ajax']);

Route::post('city',[userController::class,'ajax_city']);