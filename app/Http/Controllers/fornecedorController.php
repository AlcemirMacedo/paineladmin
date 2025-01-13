<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class fornecedorController extends Controller
{

    public function viewFornecedor(){
        $sql = DB::table('tb_fornecedores')->paginate(10);

        return view('fornecedor', compact('sql'));
    }

}
