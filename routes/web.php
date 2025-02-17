<?php

use App\Http\Controllers\rdvController;
use Illuminate\Support\Facades\Route;

Route::get('/rdvlist', [rdvController::class, 'rdvView']);
Route::get('/novordv', [rdvController::class, 'novoRdv']);
Route::post('/salvarresponsavel', [rdvController::class, 'salvarResponsavel']);
Route::get('form2Rdv/{value}', [rdvController::class, 'form2Rdv']);
Route::post('/add', [rdvController::class, 'addItens']);

// Rota para gerar o pdf
Route::post('gerarpdf', [rdvController::class, 'gerarPdf']);

//Rotas de edições
Route::get('/editarrdv/{value}', [rdvController::class, 'editarRdv']);
Route::post('/salvaredicao', [rdvController::class, 'salvarEdite']);


