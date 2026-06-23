@extends('layouts.authUser')

@section('titulo', 'Login - ReadBook')
@section('logTitle', 'Faça o seu Login')

@section('content')
    <form class="form-login d-flex flex-column gap-3" action="/logar" method="POST">
        @csrf
        <div class="form-group d-flex gap-2 flex-column">
            <label for="email">Email</label>
            <input type="email" class="form-control p-2" name="email" id="email" placeholder="Email">
        </div>
        <div class="form-group d-flex gap-2 flex-column">
            <label for="senha">Senha</label>
            <input type="password" class="form-control p-2" name="senha" id="senha" placeholder="Senha">
        </div>
        <div class="buttons-group d-flex gap-2 mt-3 p-2">
            <button class="btn btn-dark d-flex gap-2 w-100 justify-content-center" type="apagar"><i class="bi bi-box-arrow-in-right"></i><span>Entrar</span></button>
        </div>
    </form>
@endsection
