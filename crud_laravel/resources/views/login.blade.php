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
            <label for="password">Senha</label>
            <input type="password" class="form-control p-2" name="password" id="password" placeholder="Senha">
        </div>
        <div class="buttons-group d-flex gap-2 p-2">
            <button class="btn btn-dark d-flex gap-2 
            w-100 justify-content-center" type="submit">
                <i class="bi bi-box-arrow-in-right"></i><span>Entrar</span></button>
        </div>
        <div class="user-auth">
            @if (session('msg'))
                <p class="flash-message m-0 justify-content-center m-0 
                d-flex gap-2 text-danger"><i
                        class="bi bi-exclamation-circle" style="font-size:9px;"></i>
                    <span style="font-size:9px;">{{ session("msg") }}</span>
                </p>
            @endif
        </div>
    </form>
@endsection
