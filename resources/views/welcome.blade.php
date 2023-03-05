<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://kit.fontawesome.com/fc4ba6f7b9.css" crossorigin="anonymous">
        <link rel="stylesheet" href="../../public/styles.css">
        <script src="https://kit.fontawesome.com/fc4ba6f7b9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <title>Inicio | SSE Benito Juzarez</title>
</head>
<style>
    .boton{
        border-radius: 5%;
    }
</style>
<body>

    @auth

        <nav class="navbar navbar-expand-lg p-4 navbar-dark bg-dark shadow-sm">
            <div class="container">

                <div class="col-4     text-start ">
                    <a href="/" class="navbar-brand">
                        <!-- Logo Image -->
                        <img src="vendor/adminlte/dist/img/PrimariaLogo.png" width="60" alt=""
                            class="d-inline-block align-middle mr-2">
                        <!-- Logo Text -->

                        <span class="text-uppercase font-weight-bold">Escuela Primaria Benito Juarez</span>
                    </a>

                </div>

                <div class="col-5      ">

                    <h2 class="font-weight-bold text-light text-center">Sistema de Servicios Escolares</h2>

                </div>

            </div>
        </nav>

        <div class="container pt-4 mt-4 ps-5 ms-5">

            <div class="row justify-content-center align-items-center g-2 mt-4 pt-4">

                <div class="col-3 offset-1">
                    <div class="d-grid gap-2">
                    <a class="btn btn-secondary p-4 boton shadow-lg" href="https://utvco.edu.mx/">
                        <i class="fas fa-home fa-4x"></i>
                        <h4 class="pt-4 text-uppercase">Pagina Escolar</h4>
                    </a>
                    </div>
                </div>

                <div class="col-3 offset-1">
                    <div class="d-grid gap-2">
                    <a class="btn btn-dark     p-4 boton shadow-lg" href="/admin">
                        <i class="fas fa-dice-d20 fa-4x"></i>
                        <h4 class="pt-4 text-uppercase">Panel Escolar</h4>
                    </a>
                    </div>
                </div>

                <div class="col-3 offset-1">
                    <div class="d-grid gap-2">
                    <a class="btn btn-success p-4 boton shadow-lg" href="https://www.google.com.mx/">
                        <i class="fab fa-google fa-4x"></i>
                        <h4 class="pt-4 text-uppercase">Google</h4>
                    </a>
                    </div>
                </div>

            </div>
        </div>

        <footer class="py-2 bg-dark flex-shrink-0 fixed-bottom ">
            <div class="container text-center">
            {{-- <a href="https://bootstrapious.com/snippets" class="text-muted">Bootstrap snippet by Bootstrapious</a> --}}
            <p class="text-center text-light font-weight-light">Escuela Primaria Benito Juerez No. 166</p>
            <p class="text-center text-light font-weight-light">Avenida Universidad s/n, Etla, Oaxaca, C.P 71270</p>
            </div>
        </footer>

    @else

    <nav class="navbar navbar-expand-lg p-4 navbar-dark bg-dark shadow-sm">
        <div class="container">

            <div class="col-4     text-start ">
                <a href="/" class="navbar-brand">
                    <!-- Logo Image -->
                    <img src="vendor/adminlte/dist/img/PrimariaLogo.png" width="60" alt=""
                        class="d-inline-block align-middle mr-2">
                    <!-- Logo Text -->

                    <span class="text-uppercase font-weight-bold">Escuela Primaria Benito Juarez</span>
                </a>

            </div>

            <div class="col-5      ">

                <h2 class="font-weight-bold text-light text-center">Sistema de Servicios Escolares</h2>

            </div>

            {{-- <div class="col-4 ps-5">

                <div id="navbarSupportedContent" class="collapse navbar-collapse ps-5">
                    <ul class="navbar-nav ml-auto ps-5">
                        <li class="nav-item active"><a href="/" class="nav-link text-warning">Inicio <span
                                    class="sr-only">(actual)</span></a></li>
                        <li class="nav-item ps-3"><a href="https://utvco.edu.mx/" class="nav-link">Pagina
                                Institucional</a></li>
                    </ul>
                </div>

            </div> --}}

        </div>
    </nav>

    <div class="container pt-4 mt-4 ps-5 ms-5">
        <div class="row justify-content-center align-items-center g-2 mt-4 pt-4">

            <div class="col-3 offset-1">
                <div class="d-grid gap-2">
                  <a class="btn btn-secondary p-4 boton shadow-lg" href="https://utvco.edu.mx/">
                    <i class="fas fa-home fa-4x"></i>
                    <h4 class="pt-4 text-uppercase">Pagina Escolar</h4>
                  </a>
                </div>
            </div>

            <div class="col-3 offset-1">
                <div class="d-grid gap-2">
                  <a class="btn btn-dark     p-4 boton shadow-lg" href="/login">
                    <i class="fab fa-atlassian fa-4x"></i>
                    <h4 class="pt-4 text-uppercase">Iniciar Sesion</h4>
                  </a>
                </div>
            </div>

            <div class="col-3 offset-1">
                <div class="d-grid gap-2">
                  <a class="btn btn-success p-4 boton shadow-lg" href="https://www.google.com.mx/">
                    <i class="fab fa-google fa-4x"></i>
                    <h4 class="pt-4 text-uppercase">Google</h4>
                  </a>
                </div>
            </div>

        </div>
    </div>

    <footer class="py-2 bg-dark flex-shrink-0 fixed-bottom ">
        <div class="container text-center">
          {{-- <a href="https://bootstrapious.com/snippets" class="text-muted">Bootstrap snippet by Bootstrapious</a> --}}
          <p class="text-center text-light font-weight-light">Escuela Primaria Benito Juerez No. 166</p>
          <p class="text-center text-light font-weight-light">Avenida Universidad s/n, Etla, Oaxaca, C.P 71270</p>
        </div>
    </footer>

    @endauth

</body>

</html>
