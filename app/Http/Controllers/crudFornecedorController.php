<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class crudFornecedorController extends Controller
{
    public function getFornecedor($value){

        $sql = DB::select('select * from tb_fornecedores where id_fornecedores = ?', [$value]);


        return view('editarFornecedor')->with('sql', $sql);

    }
}
