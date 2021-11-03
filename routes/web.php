<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;



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

Route::get('/home', [PostController::class, "index"]);

//rota para mostrar o login form
Route::get('/login', function (){
    return view('login');
})->name('login'); //para nomear a rota com o nome login

//rota para processar o form
Route::post('/login',  [AuthController::class, "login"]);
Route::post('/logout', [AuthController::class, "logout"]);

//rota para a pagina de criação de novo post
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/post', [PostController::class, "store"]);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/posts/edit/{id}', [PostController::class, 'edit']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);

//rota para cadastrar usuários
Route::get('/register', function(){
    return view('register');
});
Route::post('/register', [AuthController::class, 'register']);