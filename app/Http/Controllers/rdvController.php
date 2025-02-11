<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rdvController extends Controller
{
    public function rdvView(){
        $sql = DB::table('rdvs')
        ->join('tb_funcionarios', 'id_funcionario', '=' ,'id_funcionario_fk')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('index', compact('sql'));
    }

    public function novoRdv(){
        $sql = DB::select('select * from tb_funcionarios');
        return view('form1')->with('sql', $sql);
    }

    public function salvarResponsavel(Request $r){

        $ultRdv = DB::select('select num_rdv from rdvs order by id desc limit 1');

        if(count($ultRdv) > 0){
            $ultimoNumero = $ultRdv[0]->num_rdv;
            $pos = strpos($ultimoNumero, '/');
            if($pos == false){
                $pos = 0;
            }

            $numRecibo = substr($ultimoNumero, 0, $pos);
            $numRdvsoma = $numRecibo + 1;
            $numRdvdb = $numRdvsoma.'/'.date('Y');
        }
        else{
            $numRdvsoma = 1;
            $numRdvdb = $numRdvsoma.'/'.date('Y');
        }

        DB::insert("insert into rdvs values (null, ?, ?, ?, ?, ?, ?, ?, null)", [
            $r->responsavel,
            $numRdvdb,
            $r->data,
            $r->justificativa,
            $r->equipe,
            $r->via,
            date('Y-m-d H:i:s'),
        ]);

        $nome = $r->responsavel;
        $via = $r->via;
        $numero = $numRdvdb;

        return view('form2', compact('nome', 'via', 'numero'));
    }

}
