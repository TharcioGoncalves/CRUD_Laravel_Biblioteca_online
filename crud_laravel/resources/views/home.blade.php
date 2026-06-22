@extends('layouts.main')

@section('titulo', 'Home')

@section('content')
    <div class="container text-end">
        <button type="button" class="btn btn-primary my-3 text-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Cadastrar Livro
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar Livro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/events/create" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" placeholder="Título" required name="titulo"
                                id="titulo">
                        </div>
                        <div class="form-group">
                            <label for="titulo">Autor</label>
                            <input type="text" class="form-control" placeholder="Autor" required name="autor"
                                id="autor">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea type="text" class="form-control" placeholder="Descrição" required name="descricao" id="descricao"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="paginas"></label>
                            <input type="number" class="form-control" placeholder="Páginas" required name="paginas"
                                id="paginas">
                        </div>
                        <div class="form-group">
                            <label for="anoPublicacao">Ano Publicação</label>
                            <input type="date" class="form-control" required name="anoPublicacao" id="anoPublicacao">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Autor</th>
                <th scope="col">Descrição</th>
                <th scope="col">Páginas</th>
                <th scope="col">Ano Publicação</th>
                <th scope="col">Acções</th>
            </tr>
        </thead>
        <tbody>
            @if (count($livros) != 0)
                @foreach ($livros as $l)
                    <tr>
                        <td>{{ $l->titulo }}</td>
                        <td>{{ $l->autor }}</td>
                        <td>{{ $l->descricao }}</td>
                        <td>{{ $l->paginas }}</td>
                        <td>{{ date('d/m/Y', strtotime($l->anoPublicacao)) }}</td>
                        <td class="d-flex gap-2">
                            <a class="btn btn-primary" href="/">Editar</a>
                            <form action="/events/{{ $l->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <td colspan="5" class="text-center">Não há livros cadastrados</td>
            @endif
        </tbody>
    </table>
@endsection
