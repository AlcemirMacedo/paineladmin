<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class userController extends Controller
{
    public function cadastro(){
        return view('cadastro');
    }

    public function addUser(Request $request){

        $senha = Hash::make($request->senha, ['rounds'=>10]);

        try {
            $sql = DB::insert('insert into tbuser values(null, ?,?,?,?)', [
                $request->fullname,
                $request->usuario,
                $senha,
                $request->email
            ]);
            return redirect('/')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro Alcemir". $e->getMessage());
            return back()->with('error', 'Não foi possível cadastrar usuário')->withInput();
        }
    }
}
