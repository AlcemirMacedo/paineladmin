<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class funcionariosController extends Controller
{
    public function listarFuncionarios(){
        $sql = DB::table('tb_funcionarios')
        ->orderBy('id_funcionario')
        ->paginate(8);

        $count_funcionarios = DB::table('tb_funcionarios')->count();
        return view('funcionarios', compact('sql', 'count_funcionarios'));
    }

    public function formFuncionario($value){


        try {

            $sql = DB::select('select * from tb_funcionarios where id_funcionario = ?', [$value]);

            return view('cadastrofuncionario', compact('sql'));
        } catch (Exception $ex) {
            //throw $th;
        }

        return view('cadastrofuncionario', compact('id'));
    }

    public function salvarFuncionario(Request $request){

        $id = $request->id;
        if($id!=null){
            $id = $request->input('id');
            $matricula = $request->input('matricula');
            $cpf = $request->input('');
        }else{

        }
        return view('cadastrofuncionario');
    }
}
