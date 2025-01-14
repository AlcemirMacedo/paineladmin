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

Route::post('/gerarpdf/{item}', function ($value) {

    $sql = DB::select('select * from tb_fornecedores where id_fornecedores = ?', [$value]);

    foreach ($sql as $s) {
        $nome = $s->nome;
    }

    $html = "
        <style type='text/css'>
            body{
                margin:0;
                padding:0;
                background-collor: red;
            }
            .container-pdf{
                width: 100%;
                height: 100%;
                background-color: #fff;
            }
        </style>



        <div>
            <h1>RECIBO</h1>
            <h2>Nome do Cliente</h2>
        </div>
    ";

    return Pdf::loadHTML($html)->setPaper('A4', 'portrait') // Define o tamanho do papel
                                ->set_option('isHtml5ParserEnabled', true) // Garante compatibilidade com HTML5
                                ->set_option('isRemoteEnabled', true) // Permite imagens externas
                                ->set_option('isPhpEnabled', false)
                                ->download("Recibo de $nome.pdf");
});
