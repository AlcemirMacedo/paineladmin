<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class crudFornecedorController extends Controller
{

    public function cadastrarFornecedor(Request $request){



        DB::insert('insert into tb_fornecedores values (null,?,?,?,?,?,?,?,?,?,?,?)', [
            $request->nome,
            $request->razaosocial,
            $request->cpfcnpj,
            $request->endereco,
            $request->bairro,
            $request->cidade,
            $request->uf,
            $request->cep,
            $request->email,
            $request->telefone,
            $request->tipo
        ]);
        return redirect('/cadastrofornecedor');

    }

    public function editarFornecedor(Request $request){
        $id = $request->input('id');
        $cpfcnpj = $request->input('cpfcnpj');
        $nome = $request->input('nome');
        $razaosocial = $request->input('razaosocial');
        $endereco = $request->input('endereco');
        $bairro = $request->input('bairro');
        $cidade = $request->input('cidade');
        $uf = $request->input('uf');
        $cep = $request->input('cep');
        $email = $request->input('email');
        $telefone = $request->input('telefone');
        $tipo_pessoa = $request->input('tipo_pessoa');

        DB::update('update tb_fornecedores set nome=?, razaosocial=?, cpfcnpj=?, endereco=?, bairro=?, cidade=?, uf=?, cep=?, email=?, telefone=?, tipo_pessoa=? where id_fornecedores = ? ', [
            $nome,
            $razaosocial,
            $cpfcnpj,
            $endereco,
            $bairro,
            $cidade,
            $uf,
            $cep,
            $email,
            $telefone,
            $tipo_pessoa,
            $id
        ]);

        return redirect('/fornecedor');
    }

    public function excluirFornecedor($value){
        try {
            DB::delete('delete from tb_fornecedores where id_fornecedores = ?', [$value]);
            return redirect('/fornecedor');
        } catch (Exception $ex) {
            return back()->with('error', 'Não foi possível excluir este recibo');
        }
    }
}
