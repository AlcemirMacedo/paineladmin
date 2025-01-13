<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function viewLogin(){
        return view('loginadm');
    }

    public function loginUsuario(Request $request){
        $senha = $request->senha;
        $user = userModel::where('login', $request->usuario)->first();

        if ($user && Hash::check($senha, $user->senha)){
            Session::put('usuarioId', $user->id_usuario);

            return redirect('/dashuser');

        }
        else{
            return back()->with('error', 'Não foi possível logar!');
        }
    }
}
