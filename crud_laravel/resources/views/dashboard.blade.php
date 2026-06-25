@extends('layouts.main')

@section('titulo', 'ReadBook - Dashboard')

@section('content')
    <div class="dashboard-content vh-100 p-5 mt-5" style="background-color:#18486f;">
        <div class="container text-end d-flex justify-content-between align-items-center px-5">
            <button type="button" class="btn btn-dark rounded-1 my-3 mt-5 text-end" onclick="cadastroLivros()">
                Adicionar Livro
            </button>
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#lixeira">
                Lixeira
            </button>
        </div>

        <div class="modal fade" id="modalCadastro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar Livro</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/events/create" method="POST" id="cadastro" class="d-flex flex-column gap-3"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="methodField"></div>
                        <div class="modal-body">
                            <div class="form-group ">
                                <label for="image">Imagem do livro</label>
                                <input type="file" class="form-control-file" required name="image" id="image">
                            </div>
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
                                <label for="paginas">Páginas</label>
                                <input type="number" class="form-control" required name="paginas" id="paginas"
                                    placeholder="Páginas">

                            </div>
                            <div class="form-group">
                                <label for="anoPublicacao">Ano Publicação</label>
                                <input type="date" class="form-control" required name="anoPublicacao" id="anoPublicacao">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table text-center mt-4 rounded-1 p-3">
            <thead>
                <tr>
                    <th scope="col" class="text-dark">Id</th>
                    <th scope="col" class="text-dark">Título</th>
                    <th scope="col" class="text-dark">Autor</th>
                    <th scope="col" class="text-dark">Páginas</th>
                    <th scope="col" class="text-dark">Ano Publicação</th>
                    <th scope="col" class="text-dark">Acções</th>
                </tr>
            </thead>
            <tbody>
                @if (count($livros) != 0)
                    @foreach ($livros as $l)
                        <tr class="table-light">
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $l->titulo }}</td>
                            <td>{{ $l->autor }}</td>
                            <td>{{ $l->paginas }}</td>
                            <td>{{ date('d/m/Y', strtotime($l->anoPublicacao)) }}</td>
                            <td class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-transparent action" onclick="modal({{ $l->id }})"><i
                                        class="bi edit bi-pencil-square fw-bolder" style="color:blue;"></i></button>
                                <form action="/events/{{ $l->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-transparent action"><i
                                            class="bi del bi-trash fw-bolder fs-5" style="color:red;"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <td colspan="7" class="text-center p-3">Não há livros cadastrados</td>
                @endif
            </tbody>
            @if (@session('msg'))
                <div class="evento-confirmado bg-success p-4 rounded-2 w-75 mx-auto">
                    <h3 class="text-center fw-bold m-0" style="color:rgb(2, 42, 2);">{{ session('msg') }}</h3>
                </div>
            @endif
        </table>

        <div class="modal fade" id="lixeira" tabindex="-1" aria-labelledby="modal-lixeira" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal-lixeira">Lixeira</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($livrosDeletados as $del)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $del->titulo }}</td>
                                        <td>{{ $del->autor }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="/restore/{{ $del->id }}" class="btn btn-primary">Restaurar</a>
                                            <a href="/events/delete/{{ $del->id }}"
                                                class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
