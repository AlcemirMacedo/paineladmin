<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', [loginController::class, 'viewLogin']);

Route::get('/cadastro', [userController::class, 'cadastro']);

Route::post('/cadastrar', [userController::class, 'addUser']);

Route::post('/login',[loginController::class, 'loginUsuario']);
