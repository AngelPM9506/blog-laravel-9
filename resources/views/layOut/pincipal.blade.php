<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <title>{{ $titulo }}</title>
</head>

<body>
    <header class="m-2 p-2">
        <!--Contenedor principal-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top pe-5" style="background-color: #d0d6fa ;">
            <!--Barra de navegavion-->
            <div class="container-fluid">
                <a class="navbar-brand" [routerLink]="'/'">
                    <img src="assets/images/logo.png" alt="" width="30" height="24"
                        class="d-inline-block align-text-top">
                    NanoBlog
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdownCategories"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
                            <ul class="dropdown-menu text-center" style="background-color:  #e8ebff ;"
                                aria-labelledby="navbarScrollingDropdownCategories">
                                @foreach ($categories as $title)
                                    <li><a class="dropdown-item">{{ $title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-right my-2 my-lg-0 navbar-nav-scroll"
                        style="--bs-scroll-height: 100px;" *ngIf="!identity">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" [routerLink]="'/login'">logIn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" [routerLink]="'/registro'">Registro</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-right my-2 my-lg-0 navbar-nav-scroll"
                        style="--bs-scroll-height: 100px;" *ngIf="identity && identity.name">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones
                            </a>
                            <ul class="dropdown-menu text-center" style="background-color:  #e8ebff ;"
                                aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="{{route('post.index')}}">Blog</a></li>
                                <li><a class="dropdown-item" href="{{route('post.create')}}">Crear entrada</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Mi perfil</a></li>
                                <li><a class="dropdown-item" [routerLink]="'/ajustes'">ajustes</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" [routerLink]="'/logout/1'">Cerrar sesión</a></li>
                            </ul>
                        </li>
                        <li class="avatar">
                            <img class="avatar_nav" src="" alt="imagen no cargada">
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--cierre barra de navegacion-->
    </header>
    <!--cierre de contenedor-->
    <main class="container min-vh-100 ">
        @yield('content')
    </main>
    <footer class="footer">
        <section class="campo-footer"></section>
        <section class="campo-footer central">
            <div class="derechos">
                <p>todos lod derechos recervados &copy; {{ date('Y') }} Mtr. Miguel Angel PM</p>
            </div>
            <div class="sociales">

            </div>
        </section>
        <section class="campo-footer"></section>
    </footer>
</body>
<script src="/js/app.js"></script>

</html>
