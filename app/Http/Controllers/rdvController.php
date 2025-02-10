<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rdvController extends Controller
{
    public function rdvView(){
        $sql = DB::table('rdvs')
        ->join('tb_funcionarios', 'id_funcionario', '=' ,'id_funcionario_fk')
        ->paginate(10);
        return view('index', compact('sql'));
    }

    public function novoRdv(){
        $sql = DB::select('select * from tb_funcionarios');
        return view('form1')->with('sql', $sql);
    }

    
}
