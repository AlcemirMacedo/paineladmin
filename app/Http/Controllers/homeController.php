<?php

namespace App\Http\Controllers;

use App\Models\fornecedoresModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function viewHome(){

        // $ultimoRegistro = fornecedoresModel::orderBy('id_fornecedores', 'asc');
        // // dd($ultimoRegistro);
        // foreach($ultimoRegistro as $item){
        //     $id = $item->id_fornecedores;
        //     $nome = $item->nome;
        // }
        $ultimo_For = DB::select('select * from tb_fornecedores order by id_fornecedores');


        $fornecedores = DB::select('select * from tb_fornecedores');

        $count_fornecedores = count($fornecedores);

        return view('home',[
            'ultimoRegistro'=>$ultimo_For,
            'count_fornecedores'=>$count_fornecedores
        ]);
    }
}
