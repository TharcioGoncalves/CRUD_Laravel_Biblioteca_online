@extends('layouts.main')

@section('titulo', 'ReadBook - Home')

@section('content')
    <main class="hero m-0 w-100" id="hero" style="height: 400px">
        <div class="hero-container p-5 d-flex flex-column gap-2 m-0 h-100 w-100
        d-flex justify-content-center row"
            style="background-color: rgba(0, 0, 255, 0.492)">
            <div class="hero-text-content col-12 col-sm-7 text-center 
            text-sm-start d-flex flex-column gap-3">
                <h1 class="fw-bold fs-1 text-white">Lê mais, Descobre mais, Aprende mais!</h1>
                <p style="color:#e1f5ee">Esta é a sua biblioteca online, onde encontras os teus livros favoritos e
                    emocionantes.Acesse a nossa
                    biblioteca e divirta-se como nunca se divertio</p>
            </div>
            <div class="group-buttons">
                <a href="#books-section"
                    class="d-flex gap-2 text-white btn btn-dark
                align-items-center justify-content-center py-2 px-3"
                    style="width:115px;font-size:11px;">
                    <i class="bi bi-arrow-down"></i>
                    <p class="m-0">Veja os livros</p>
                </a>
            </div>
        </div>
    </main>
    <section id="books-section" style="background-color:#18486f;" class="p-4">
        <div class="container p-5 text-center">
            <div class="book-text-content">
                <h2 class="fs-2 fw-bold book-content-title">Livros Disponíveis</h2>
                <div class="text-line mx-auto mt-3 rounded-1"></div>
            </div>
            <div class="cards group-cards my-5 d-flex flex-wrap gap-3">
                @if (count($livros) != 0)
                    @foreach ($livros as $l)
                        <div class="card border-0" style="width:150px;background-color:transparent;">
                            <img class="card-img-top" src="img/imagens/{{ $l->image }}" alt="{{ $l->titulo }}">
                            <div class="card-body text-start d-flex flex-column justify-content-between" style="background-color:red;">
                                <h3 class="card-title text-white">{{ $l->titulo }}</h3>
                                <p class="card-text text-white">{{ $l->descricao }}</p>
                                <a class="btn btn-dark d-flex gap-2 px-2 py-1 align-items-center w-50" 
                                href="#"><i class="bi bi-play fs-5"></i><span>Ler</span></a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="without-content w-100">
                        <p class="text-center text-white">Não há livros diponiveis!</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
