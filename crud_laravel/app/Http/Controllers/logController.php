<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class logController extends Controller
{
    public function index(){
        return view("login");
    }
    public function telaCadastro(){
        return view("cadastro");
    }
    public function cadastrar(Request $request){
        $user = new User();
        $users = User::all();
        $exist = false;

        foreach($users as $user){
            if($user->email == $request->email){
                $exist = true;
            }
        }
        
        if($exist){
            return redirect()->back()->with("msg", "Dados já existentes");
        }else{
            $user->name = $request->nome;
            $user->email = $request->email;
            $user->password = $request->senha;
            $user->save();
        }

        return redirect("/");
    }

    public function login(Request $request){
        $logUser = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if(Auth::attempt($logUser)){
            $request->session()->regenerate();

            return redirect()->intended("/");
        }

        return redirect()->back()->with("msg", "Usuário inválido");
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
