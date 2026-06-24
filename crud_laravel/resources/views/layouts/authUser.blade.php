<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>@yield('titulo')</title>
</head>

<body>
    <a class="return-back fixed-top pointer m-4 d-flex justify-content-center rounded-2" style="width: 30px"
     href="/"><i class="bi bi-arrow-left text-white fs-3"></i></a>
    <div class="w-100 m-0 vh-100 d-flex justify-content-center align-items-center" style="background-color:#18486f;">
        <div class="form-content bg-white rounded-2 p-4 d-flex flex-column gap-2"
            style="width: 300px; min-height: text-content;">
            <h2 class="login-text fs-3 fw-bold">@yield('logTitle')</h2>
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="JS/script.js"></script>
</body>

</html>
