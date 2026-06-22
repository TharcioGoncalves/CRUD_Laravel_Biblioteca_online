<?php

namespace App\Http\Controllers;
use App\Models\Livro;

use Illuminate\Http\Request;

class bookController extends Controller
{
    public function index(){
        $livros = Livro::all();

        return view("home", ["livros" => $livros]);
    }

    public function store(Request $request){
        $livro = new Livro();

        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->descricao = $request->descricao;
        $livro->anoPublicacao = $request->anoPublicacao;
        $livro->paginas = $request->paginas;

        $livro->save();
        return redirect("/")->with("msg", "Livro cadastrado com sucesso");
    }

    public function destroy($id){
        Livro::findOrFail($id)->delete();

        return redirect("/")->with("msg", "Livro eliminado com sucesso");
    }

}
