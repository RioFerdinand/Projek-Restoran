<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/67b6ece322.js" crossorigin="anonymous"></script>

    <title>Manajer | LeoCafe</title>
</head>

<body style="background-color: antiquewhite" id="home" class="pt-5">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top" style="background-color: rgb(247 154 154);">
        <div class="container">
            <a class="navbar-brand" href="#"> <i class="fa-solid fa-shop"></i> LeoCafe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" ><i class="fa-solid fa-list-check"></i> {{ auth()->user()->username }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" >|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('menu')" aria-current="page" href="{{ url('menu') }}"><i class="fa-solid fa-utensils"></i> Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('laporan')" aria-current="page" href="{{ url('laporan') }}"><i class="fa-solid fa-download"></i> Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" >|</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button style="border: 0; background-color: rgb(247 154 154);" type="submit" class="nav-link active" aria-current="page">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <div id="content">
        <br>
        <div class="container">
            <section class="content">
                @yield('content')
            </section>
        </div>
    </div>

</body>
</html>