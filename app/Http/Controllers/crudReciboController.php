<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;

class crudReciboController extends Controller
{
    public function viewGrid(){
        $sql = DB::table('tbrecibo')
                ->join('tb_fornecedores', 'tb_fornecedores.cpfcnpj', '=', 'tbrecibo.cpfcnpj_recibo')
                ->select('tbrecibo.*', 'tb_fornecedores.nome')
                ->orderBy('id_recibo', 'desc')
                ->paginate(9);
        return view('gridrecibo', compact('sql'));
    }

    public function exluirRecibo($value){

        try {
            $sql = DB::delete('delete from tbrecibo where id_recibo = ?', [$value]);
            return redirect('/gridrecibo');
        } catch (Exception $ex) {
            return back()->with('error', 'Não foi possível excluir este recibo');
        }
    }

    public function viewFormRecibo(){
        return view('formRecibo');
    }
}
