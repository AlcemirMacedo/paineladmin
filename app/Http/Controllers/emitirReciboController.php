<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\DB;

class emitirReciboController extends Controller
{
    public function emitirRecibo($value){
        $sql = DB::select('select * from tb_fornecedores where id_fornecedores = ?', [$value]);


        return view('emitirrecibo')->with('sql', $sql);
    }

    // public function gerarPdf($value2){

    //     $sql2 = DB::select('select * from tb_fornecedores where id_fornecedores = ?', [$value2]);

    //     foreach ($sql2 as $s) {
    //         [
    //             $nome = $s->nome,
    //         ];
    //     }

    //     $pdf = Pdf::loadView('gerarpdf', $nome);

    //     return $pdf->download('Recibo.pdf');
    // }
}
