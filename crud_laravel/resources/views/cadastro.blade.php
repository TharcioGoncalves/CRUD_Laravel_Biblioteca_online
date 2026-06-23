@extends('layouts.authUser')

@section('titulo', 'Cadastro - ReadBook')
@section('logTitle', "Cadastrar")

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
        <div class="buttons-group d-flex gap-2 mt-3 p-2 justify-content-end align-items-center">
            <a href="/login"class="text-dark already-registered">Já registrado?</a>
            <button class="btn btn-dark" type="apagar"><span>Registrar</span></button>
        </div>
    </form>
@endsection
