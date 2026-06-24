@extends('layouts.authUser')

@section('titulo', 'Cadastro - ReadBook')
@section('logTitle', 'Cadastro')

@section('content')
    <form class="form-login d-flex flex-column gap-3" action="/cadastrar" method="POST">
        @csrf
        <div class="form-group d-flex gap-2 flex-column">
            <label for="nome">Nome</label>
            <input type="text" class="form-control p-2" name="nome" id="nome" placeholder="Nome">
        </div>
        <div class="form-group d-flex gap-2 flex-column">
            <label for="email">Email</label>
            <input type="email" class="form-control p-2" name="email" id="email" placeholder="Email">
        </div>
        <div class="form-group d-flex gap-2 flex-column">
            <label for="senha">Senha</label>
            <input type="password" class="form-control p-2" name="senha" id="senha" placeholder="senha">
        </div>
        <div class="user-auth">
            @if (session('msg'))
                <p class="flash-message m-0 justify-content-center m-0 
                d-flex gap-2 text-danger"><i
                        class="bi bi-exclamation-circle" style="font-size:9px;"></i>
                    <span style="font-size:9px;">{{ session('msg') }}</span>
                </p>
            @endif
        </div>
        <div class="buttons-group d-flex gap-2 mt-1 p-2 justify-content-end align-items-center">
            <a href="/login"class="text-dark already-registered">Já cadastrado?</a>
            <button class="btn btn-dark" type="submit"><span>Cadastrar</span></button>
        </div>
    </form>
@endsection
