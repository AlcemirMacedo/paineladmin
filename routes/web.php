<?php

use App\Http\Controllers\crudFornecedorController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\emitirReciboController;
use App\Http\Controllers\fornecedorController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\userController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', [loginController::class, 'viewLogin']);

Route::get('/cadastro', [userController::class, 'cadastro']);

Route::post('/cadastrar', [userController::class, 'addUser']);

Route::post('/login',[loginController::class, 'loginUsuario']);

Route::get('/dashuser', [dashController::class, 'viewDash']);

Route::get('/logout', [logoutController::class, 'logoutUser']);

Route::get('/home', [homeController::class, 'viewHome']);

Route::get('/fornecedor', [fornecedorController::class, 'viewFornecedor']);

Route::get('/editarfornecedor/{value}', [crudFornecedorController::class, 'getFornecedor']);

Route::get('emitirrecibo/{value}', [emitirReciboController::class, 'emitirRecibo']);

Route::post('/gerarpdf/{item}', function ($value) {

    $sql = DB::select('select * from tb_fornecedores where id_fornecedores = ?', [$value]);

    foreach ($sql as $s) {
        $nome = $s->nome;
    }

    $ano = Date('Y');
    $data = Date('d/m/Y');
    $hora = Date('H:i');

    $html = "
        <style type='text/css'>
    html, body{
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

    .line{
        border-bottom: 1px dashed gray;
        margin-bottom: 20px;
        width: 180mm;
    }
    .main-body{
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 180mm;
        height:280mm;
        margin-left:10mm;
        margin-top:10mm;
    }
    .container-pdf{
        width: 100%;
        height: 110mm;
        background-color: #fff;
        border: 1px solid rgb(0, 0, 0);
        border-radius: 10px;
        margin-bottom:5mm;
        padding: 5mm;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
    }
    .table-rec{
        width:100%;
    }
    .table-rec td{
        padding:1.3mm;
    }
    .table-rec .title-rec{
        font-size:30pt;
        font-weight: bold;
    }
    .table-rec .t-style{
        border: 1px solid black;
        border-radius:2mm;
        width:50mm;
        padding-left: 2mm;
    }
    .table-rec .valor span{
        font-size:18pt;
        font-weight: bold;
    }
    .table-rec .desc-ref{
        border: 1px black solid;
        border-radius:10px;
        line-height:5mm;
    }
    .table-rec  .footer-rec{
        border-top: 1px black dashed;
        text-align: center;
        font-size:9pt;
        padding: 2px;
        line-height:2mm;
    }
    .text-assign{
        text-align:center;
        border-top: 1px solid black;
        font-size: 8pt;
        position: absolute;
        margin-top: -30px;
        width:50mm;
    }
</style>
<div class='main-body'>


    <div class='container-pdf'>
        <table class='table-rec' border='0'>
            <tr>
                <td class='title-rec'>Recibo</td>
                <td align='center' class='t-style serie'>Nº 02987/$ano</td>
                <td></td>
                <td align='right' class='t-style valor'>R$ <span> 2.500,00</span></td>
            </tr>
            <tr>
                <td colspan='4'></td>
            </tr>
            <tr>
                <td colspan='4' class='desc-ref'>
                    Recebi(emos) de(a): <span>$nome</span><br><br>
                    a importância de: Dois mil e quinhetos reais<br><br>
                    Referente a: <br><br>
                    Manaus, <span style='font-size: 12pt; font-weight:bold'>$data </span><span style='font-size: 9pt'>| $hora</span>
                </td>
            </tr>


            <tr>
                <td colspan='2'>
                        <table align='left'>
                            <tr>
                                <td>
                                    <img src='img/assinatura.png' width='180'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class='text-assign'>
                                        Júlio Neto<br>
                                        Infortread Telecom<br>
                                        Gerente Geral
                                    </div>
                                </td>
                            </tr>
                        </table>
                </td>
                <td colspan='2' align='right'>
                    <img src='img/carimbo.jpg' width='180'>
                </td>
            </tr>


            <tr>
                <td colspan='4' class='footer-rec'>
                    <p>Endereço Comercial: RUA DJALMA DUTRA - 44 - NOSSA SENHORA DAS GRACAS | MANAUS-AM - CEP 63.053-400 |</p>
                    <p>Contato: (92)9271-7118 | Email: infortread.am@gmail.com | Site: www.infortread.com.br</p>
                </td>
            </tr>
        </table>
    </div>

    <div class='line'></div>

    <div class='container-pdf'>
        <table class='table-rec' border='0'>
            <tr>
                <td class='title-rec'>Recibo</td>
                <td align='center' class='t-style serie'>Nº 02987/$ano</td>
                <td></td>
                <td align='right' class='t-style valor'>R$ <span> 2.500,00</span></td>
            </tr>
            <tr>
                <td colspan='4'></td>
            </tr>
            <tr>
                <td colspan='4' class='desc-ref'>
                    <p>Recebi(emos) de(a): <span>$nome</span></p>
                    <p>a importância de: Dois mil e quinhetos reais</p>
                    <p>Referente a: LINK DE INTERNET NAS TORRES DA IMPACTO REFERENTE AO MES DENOVEMBRO.</p>
                </td>
            </tr>


            <tr>
                <td colspan='2'>
                        <table align='left'>
                            <tr>
                                <td>
                                    <img src='img/assinatura.png' width='180'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class='text-assign'>
                                        Júlio Neto<br>
                                        Infortread Telecom<br>
                                        Gerente Geral
                                    </div>
                                </td>
                            </tr>
                        </table>
                </td>
                <td colspan='2' align='right'>
                    <img src='img/carimbo.jpg' width='180'>
                </td>
            </tr>


            <tr>
                <td colspan='4' class='footer-rec'>
                    <p>Endereço Comercial: RUA DJALMA DUTRA - 44 - NOSSA SENHORA DAS GRACAS | MANAUS-AM - CEP 63.053-400 |</p>
                    <p>Contato: (92)9271-7118 | Email: infortread.am@gmail.com | Site: www.infortread.com.br</p>
                </td>
            </tr>
        </table>
    </div>

</div>

    ";

    return Pdf::loadHTML($html)->setPaper('A4', 'portrait') // Define o tamanho do papel
                                ->set_option('isHtml5ParserEnabled', true) // Garante compatibilidade com HTML5
                                ->set_option('isRemoteEnabled', true) // Permite imagens externas
                                ->set_option('isPhpEnabled', false)
                                ->download("Recibo de $nome.pdf");
});
