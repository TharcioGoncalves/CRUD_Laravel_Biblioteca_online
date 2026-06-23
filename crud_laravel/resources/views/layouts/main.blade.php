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
    <link rel="stylesheet" href="CSS/styles.css">
</head>

<body>
    <header class="navbar navbar-expand-md fixed-top p-3" id="navbar">
        <div class="container-fluid">
            <a href="#" class="navbar-brand fw-bold text-white" style="font-size:18px;">Read<span
                    style="font-size:18px; color:blue;" id="logo-part-name">Book</span></a>
        </div>
        <div class="collapse navbar-collapse" style="width:550px;">
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
                    <a href="/" class="nav-link text-white">
                        Meus Livros
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link text-white">
                        Entrar
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link text-white">
                        Cadastrar
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <div class="container-fluid w-100 p-0">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="JS/script.js"></script>
</body>

</html>
