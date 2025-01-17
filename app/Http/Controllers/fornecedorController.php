<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class fornecedorController extends Controller
{

    public function viewFornecedor(){
        $sql = DB::table('tb_fornecedores')->paginate(10);

        return view('fornecedor', compact('sql'));
    }


    public function getFornecedor($value){

        $sql = DB::select('select * from tb_fornecedores where id_fornecedores = ?', [$value]);


        return view('editarFornecedor')->with('sql', $sql);

    }

}
