<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class bookController extends Controller
{
    public function index()
    {
        $livrosDeletados = Livro::onlyTrashed()->get();
        $livros = Livro::where("user_id", Auth::id())->get();

        return view('dashboard', ['livros' => $livros, "livrosDeletados" => $livrosDeletados]);
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
            $imageName = md5($request->image->getClientOriginalName().strtotime('now')).'.'.$extensao;

            $request->image->move(public_path('img/imagens'), $imageName);
            $livro->image = $imageName;
        }
        $user = Auth::User();
        $livro->user_id = $user->id;
        $livro->save();

        return redirect()->back()->with('msg', 'Livro cadastrado com sucesso');
    }

    public function destroy($id)
    {
        Livro::findOrFail($id)->delete();

        return redirect()->back()->with('msg', 'Livro eliminado com sucesso');
    }

    public function edit($id)
    {
        $edit = Livro::findOrFail($id);

        if (! $edit) {
            return response()->json(['error' => 'Livro não encontrado'], 404);
        }

        return response()->json($edit);
    }

    public function update(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);

        if($livro->image && Storage::disk("public")->exists($livro->image)){
            Storage::disk("public")->delete($livro->image);
        }
        $extension = $request->image->extension();
        $nomeImagem = md5($request->image->getClientOriginalName().strtotime('now')).'.'.$extension;
        $request->image->move(public_path("img/imagens"), $nomeImagem);

        Livro::findOrFail($request->id)->update([
            "titulo" => $request->titulo,
            "autor" => $request->autor,
            "descricao" => $request->descricao,
            "anoPublicacao" => $request->anoPublicacao,
            "paginas" => $request->paginas,
            "image" => $nomeImagem
        ]);

        return redirect('/')->with('msg', 'Livro editado com sucesso');
    }

    public function restore($id){
        $livro = Livro::withTrashed()->find($id);
        $livro->restore();

        return redirect()->back()->with("msg", "Restaurado com sucesso");
    }
    public function delete($id){
        $livro = Livro::withTrashed()->find($id);
        $livro->forceDelete();

        return redirect()->back();
    }
}
