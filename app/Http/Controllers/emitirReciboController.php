<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;

class emitirReciboController extends Controller
{
    public function emitirRecibo($value){
        $sql = DB::select('select * from tb_fornecedores where id_fornecedores = ?', [$value]);

        return view('emitirrecibo')->with('sql', $sql);
    }

    public function recebeDados(Request $s){
        dd($s);
    }
}
