<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
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

        $selectJoin = DB::select('select * from rdvs join tb_funcionarios on id_funcionario_fk = id_funcionario where id=?', [$numRdvdb]);
        $selectItens = DB::select('select * from itens_rdvs where rdv_id=? order by id desc', [$r->idrdv]);

        return view('form2', compact('selectJoin', 'selectItens'));

    }

    public function addItens(Request $request){
        DB::insert('insert into itens_rdvs values (null, ?, ?, ?, ?, ?, ?)', [
            $request->idrdv,
            $request->descricao,
            $request->valor,
            $request->quantidade,
            $request->total,
            $request->obs
        ]);

        $selectJoin = DB::select('select * from rdvs join tb_funcionarios on id_funcionario_fk = id_funcionario where id=?', [$request->numrdv]);
        $selectItens = DB::select('select * from itens_rdvs where rdv_id=? order by id desc', [$request->idrdv]);

        // $selectJoin = DB::select('select r.id, r.num_rdv, f.nome_funcionario, r.equipe, r.via, r.data_viagem, r.justificativa, r.created_at, ite.id, ite.rdv_id, ite.descricao, ite.valor, ite.quantidade, ite.valor_total, ite.observacao from rdvs r join itens_rdvs ite on ite.rdv_id = r.id join tb_funcionarios f on f.id_funcionario = r.id_funcionario_fk where r.num_rdv = ?',[
        //     $request->numrdv
        // ]);

        return view('form2', compact('selectJoin', 'selectItens'));
    }

    public function gerarPdf(Request $request){

        $nomefun = $request->nome;
        $numrdv = str_replace('/', '', $request->numrdv);

        $data_iso = $request->data;

        // Substitui hífens por barras
        $data_temp = str_replace('-', '/', $data_iso);

        // Reorganiza a data para o formato DD/MM/YYYY
        $data_br = substr($data_temp, 8, 2) . '/' . substr($data_temp, 5, 2) . '/' . substr($data_temp, 0, 4);

        $html = "
            <style type='text/css'>
                html, body {
                    height: 297mm;
                    width: 210mm;
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    text-align: center;
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                }
                .main-body {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    width: 180mm;
                    height: 280mm;
                    margin-left: 10mm;
                    margin-top: 10mm;
                }
                .container-pdf {
                    width: 100%;
                    height: 120mm;
                    background-color: #fff;
                    border: 1px solid rgb(0, 0, 0);
                    margin-bottom: 5mm;
                    padding: 5mm;
                    align-items: center;
                    background: url('img/watermark.png');
                    background-position: center;
                    background-size: cover;
                    background-repeat: no-repeat;
                }
                .text-head{
                    line-height:20%;
                    font-size:7pt;
                    padding-left:10px;
                }
            </style>
            <div class='main-body'>
                <table>
                    <tr>
                        <td><img src='img/logo.png' width='100'></td>
                        <td class='text-head'>
                            <p>GERENCIA DE ADMINISTAÇÃO E FINANÇAS</p>
                            <p>TECNOLOGIA DA INFORMAÇÃO</p>
                            <p>PROVISIONAMENTO FINANCEIRO PARA VIAGENS</p>
                        </td>
                    </tr>
                </table>
                <div class='container-pdf'>
                    $data_br
                </div>
            </div>
        ";

        return Pdf::loadHTML($html)->setPaper('A4', 'portrait') // Define o tamanho do papel
                                ->set_option('isHtml5ParserEnabled', true) // Garante compatibilidade com HTML5
                                ->set_option('isRemoteEnabled', true) // Permite imagens externas
                                ->set_option('isPhpEnabled', false)
                                ->download("RDV nº $numrdv $nomefun.pdf");

        return redirect('/rdvlist');

    }
}
