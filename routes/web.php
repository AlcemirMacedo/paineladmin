<?php

use App\Http\Controllers\crudFornecedorController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\emitirReciboController;
use App\Http\Controllers\fornecedorController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\userController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', [loginController::class, 'viewLogin']);

Route::get('/cadastro', [userController::class, 'cadastro']);

Route::post('/cadastrar', [userController::class, 'addUser']);

Route::post('/login',[loginController::class, 'loginUsuario']);

Route::get('/dashuser', [dashController::class, 'viewDash']);

Route::get('/logout', [logoutController::class, 'logoutUser']);

Route::get('/home', [homeController::class, 'viewHome']);

Route::get('/fornecedor', [fornecedorController::class, 'viewFornecedor']);

Route::get('/editarfornecedor/{value}', [crudFornecedorController::class, 'getFornecedor']);

Route::get('emitirrecibo/{value}', [emitirReciboController::class, 'emitirRecibo']);

Route::post('/gerarpdf', [emitirReciboController::class, 'gerarPdf']);
