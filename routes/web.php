<?php

use App\Http\Controllers\crudFornecedorController;
use App\Http\Controllers\crudReciboController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\emitirReciboController;
use App\Http\Controllers\fornecedorController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', [loginController::class, 'viewLogin']);
Route::post('/login',[loginController::class, 'loginUsuario']);
Route::get('/cadastro', [userController::class, 'cadastro']);

Route::middleware(['session'])->group(function(){
    Route::post('/cadastrar', [userController::class, 'addUser']);
    Route::get('/dashuser', [dashController::class, 'viewDash']);
    Route::get('/logout', [logoutController::class, 'logoutUser']);
    Route::get('/home', [homeController::class, 'viewHome']);
    Route::get('/fornecedor', [fornecedorController::class, 'viewFornecedor']);
    Route::get('/editarfornecedor/{value}', [fornecedorController::class, 'getFornecedor']);
    Route::get('/emitirrecibo/{value}', [emitirReciboController::class, 'emitirRecibo']);
    Route::post('/gerarpdf', [emitirReciboController::class, 'gerarPdf']);
    Route::get('/gridrecibo', [crudReciboController::class, 'viewGrid']);
    Route::get('/formrecibo/{value}', [crudReciboController::class, 'viewFormRecibo']);
    Route::get('/exluirrecibo/{value}', [crudReciboController::class, 'exluirRecibo']);
    Route::post('/baixarpdf', [emitirReciboController::class, 'baixarPDF']);
    Route::post('/editarrecibo', [crudReciboController::class, 'editarRecibo']);
    Route::post('/editarfornecedor', [crudFornecedorController::class, 'editarFornecedor']);
    Route::get('/excluirfornecedor/{value}', [crudFornecedorController::class, 'excluirFornecedor']);
    Route::get('/usuarios', [userController::class, 'mostrarUsuarios']);
    Route::get('/excluirsuario/{value}', [userController::class, 'excluirUsuario']);
    Route::get('/formrusuario/{value}', [userController::class, 'formUsuario']);
    Route::get('/searchfornecedor', [fornecedorController::class, 'searchFornecedor']);
    Route::get('/searchrecibo', [crudReciboController::class, 'searchRecibo']);
    Route::get('/cadastrofornecedor', [fornecedorController::class, 'formFornecedor']);
    Route::post('/cadastrarfornecedor', [crudFornecedorController::class, 'cadastrarFornecedor']);
});
