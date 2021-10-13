<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;



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

Route::get('/home', [HomeController::class, "index"]);

//rota para mostrar o login form
Route::get('/login', function (){
    return view('login');
})->name('login'); //para nomear a rota com o nome login

//rota para processar o form
Route::post('/login',  [AuthController::class, "login"]);
Route::post('/logout', [AuthController::class, "logout"]);
