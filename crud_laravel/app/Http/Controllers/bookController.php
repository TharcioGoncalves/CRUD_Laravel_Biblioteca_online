<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class bookController extends Controller
{
    public function index()
    {
        $livros = Livro::all();

        return view('dashboard', ['livros' => $livros]);
    }

    public function home()
    {
        $livros = Livro::all();

        return view('home', ['livros' => $livros]);
    }

    public function store(Request $request)
    {
        $livro = new Livro;

        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->descricao = $request->descricao;
        $livro->anoPublicacao = $request->anoPublicacao;
        $livro->paginas = $request->paginas;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $extensao = $request->image->extension();
            $imageName = md5($request->image->getClientOriginalName() . strtotime('now')).'.'.$extensao;

            $request->image->move(public_path('img/imagens'), $imageName);
            $livro->image = $imageName;
        }
        $livro->save();

        return redirect('/')->with('msg', 'Livro cadastrado com sucesso');
    }

    public function destroy($id)
    {
        Livro::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Livro eliminado com sucesso');
    }

    public function edit($id)
    {
        $edit = Livro::findOrFail($id);

        if (! $edit) {
            return response()->json(['error' => 'Livro não encontrado'], 404);
        }

        return response()->json($edit);
    }

    public function update(Request $request)
    {
        Livro::findOrFail($request->id)->update($request->all());

        return redirect('/')->with('msg', 'Livro editado com sucesso');
    }
}
