<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous" defer>
    </script>
    <script src="JS/script.js" defer></script>
    <link rel="stylesheet" href="CSS/styles.css">
</head>

<body>
    <header class="navbar navbar-expand-md fixed-top p-3 d-flex justify-content-between bg-dark" id="navbar">
        <div class="container-fluid">
            <a href="#" class="navbar-brand fw-bold text-white" style="font-size:18px;">Read<span
                    style="font-size:18px; color:blue" id="logo-part-name">Book</span></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav fw-bold">
                <li class="nav-item">
                    <a href="/" class="nav-link text-white">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link text-white">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white" style="min-width:80px;">
                        Meus Livros
                    </a>
                </li>
                @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link text-white">
                            Entrar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link text-white">
                            Cadastrar
                        </a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout" class="nav-link text-white"
                                onclick="event.preventDefault();this.closest('form').submit()">Sair</a>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </header>
    <div class="container-fluid w-100 p-0">
        @yield('content')
    </div>
    <footer class="footer bg-dark">
        <div class="container p-5 pb-4">
            <div class="footer-group1 d-flex justify-content-between">
                <div class="content-footer1 d-flex flex-column gap-3">
                    <a href="#" class="navbar-brand fw-bold text-white" style="font-size:18px;">Read<span
                            style="font-size:18px; color:blue" id="logo-part-name">Book</span></a>
                    <p class="text-white" style="font-size: 9px">A ReadBook é uma plataforma online onde podes partilhar
                        e ler os livros partilhados por outros usuários, o objectivo é que todo o mundo se divita
                        lendo livros e postando livros que gostem, dando a possibilidade de outros poderem ler</p>
                    <ul class="list-unstyled d-flex gap-2">
                        <li><button class="btn media-btn py-1 px-2" style="background-color:white">
                                <i class="bi bi-youtube text-danger"></i>
                            </button></li>
                        <li><button class="btn media-btn py-1 px-2" style="background-color:white">
                                <i class="bi bi-linkedin" style="color:rgb(40, 102, 136);"></i>
                            </button></li>
                        <li><button class="btn media-btn py-1 px-2" style="background-color:white">
                                <i class="bi bi-instagram" style="color:rgb(255, 0, 230);"></i>
                            </button></li>
                    </ul>
                </div>
                <div class="content-footer2 d-flex flex-column gap-3 px-5">
                    <h3 class="text-white fs-3 fw-bold">Links Rápidos</h3>
                    <ul class="list-unstyled fw-bold d-flex flex-column gap-3">
                        <li class="nav-item">
                            <a href="/" class="nav-link" style="font-size:9px;font-weight:200;color:white;">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link" style="font-size:9px;font-weight:200;color:white;">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                style="min-width:80px;font-size:9px;
                            font-weight:200;color:white;">
                                Meus Livros
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="content-footer3 d-flex flex-column gap-3 px-5">
                    <h3 class="text-white fs-3 fw-bold">Nossa biblioteca</h3>
                    <ul class="list-unstyled fw-bold d-flex flex-column gap-2">
                        <li class="location-item d-flex gap-2">
                            <i class="bi bi-geo-alt text-white" style="font-size:9px;font-weight:200;"></i>
                            <p style="font-size:9px;font-weight:200;" class="text-white">Angola, Luanda, Rangel - CTT,
                                ITEL</p>
                        </li>
                        <li class="number-item d-flex gap-2">
                            <i class="bi bi-telephone text-white" style="font-size:9px;font-weight:200;"></i>
                            <p style="font-size:9px;font-weight:200;" class="text-white">+244 947976480</p>
                        </li>
                        <li class="email-item d-flex gap-2">
                            <i class="bi bi-envelope text-white" style="font-size:9px;font-weight:200;"></i>
                            <p style="font-size:9px;font-weight:200;" class="text-white">tharciogoncalves413@gmail.com
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="text-white">
            <div class="footer-group2 d-flex justify-content-center align-items-center mt-4 m-0">
                <p class="text-white m-0" style="font-size:9px;font-weight:200;">ReadBook Website - &copy; Direitos
                    Reservados</p>
            </div>
        </div>
    </footer>

</body>

</html>
