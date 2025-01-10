<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function viewLogin(){
        return view('loginadm');
    }


    public function loginUsuario(Request $request){
        $user = userModel::where('login', $request->usuario)->first();

        if ($user && Hash::check($request->senha, $user->senha)){
            return 'ok';
        }
        else{
            return back()->with('error', 'Não foi possível logar!');
        }
    }
}
