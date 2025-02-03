<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rdvController extends Controller
{
    //Método responsável por chamar o formulário TDV trazendo todos os funcionários cadastrados
    public function formRdv(){

        $sql = DB::select('select * from tb_rdv');
        return view('formrdv')->with('sql');
    }

    public function listarRdv(){

        $sql = DB::table('tb_rdv')
        ->paginate(9);

        // $sql = DB::select('select * from tb_rdv order by id_rdv desc');

        if(!$sql){
            $sql = [];
        }

        $count = count($sql);

        return view('gridrdv', compact('sql', 'count'));
    }

    public function cadastrarRdv(Request $request){
        $sql = DB::insert('insert into tb_rdv values (null, )');
    }
}
