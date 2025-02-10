<?php

use App\Http\Controllers\rdvController;
use Illuminate\Support\Facades\Route;

Route::get('/', [rdvController::class, 'rdvView']);
Route::get('/novordv', [rdvController::class, 'novoRdv']);
