<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rdvController extends Controller
{

    public function formRdv(){

        return view('formrdv');
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
}
