<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema Egresado') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset("imagenes/egresado.ico") }}" />
    <script src="https://kit.fontawesome.com/5e6d638aa4.js" crossorigin="anonymous"></script>
</head>
<body style="background: url(imagenes/bck_egresado.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;">

    <div id="app">
        <nav class="text-white block relative" style="z-index: 100;">
            <ul class="bg-black table w-full">
                <!--primer nivel-->
                <br>
                &nbsp
                <i class="fas fa-graduation-cap fa-3x"></i>
                &nbsp
                <span class="text-white font-bold text-3xl tracking-tighter ">Sistema Egresados</span>
                <li class="float-right leading-foro relative mx-6 my-1 "><a href="{{ url('/') }}"><i >INICIO</i></a>
                    <ul class="absolute" style="right: -50px; ">
                        <!--Segundo nivel-->

                                @guest
                                    <!--<li class="bg-black" style="width: 200px;">&nbsp<button class="hover:bg-white" href="{{ route('logout') }}"><i
                                                class="fas fa-users-cog"></i>&nbsp LOGIN OE GONORREA</button>-->
                                        <ul class="absolute" style="right: 100%; top: 0; width: 90%;">
                                @else
                                                <li class="bg-black" style="width: 200px;">&nbsp<button class="hover:bg-white" href="#"><i
                                                            class="fas fa-users-cog"></i>&nbsp control egresados</button>
                                                    <ul class="absolute" style="right: 100%; top: 0; width: 90%;">
                                <!--Tercer nivel-->
                                @if (Auth::user()->isAdmin2())

                                <li class="bg-black">
                                    <a class="hover:bg-white" href="{{ route('register.egre') }}">&nbsp<i class="fas fa-user-plus"></i>&nbsp
                                        Agregar
                                        egresado</a><br>
                                    <a class="hover:bg-white">&nbsp<i class="fas fa-user-edit"></i>&nbsp
                                        Modificar
                                        egresado</a><br>
                                    <a class="hover:bg-white">&nbsp<i class="fas fa-user-times"></i>&nbsp Eliminar
                                        egresado</a><br>
                                    <a class="hover:bg-white" href="#">&nbsp<i class="fas fa-user-check"></i>&nbsp
                                        Visualizar egresado</a>
                                </li>
                                @endif
                                @if (Auth::user()->isAdmin())
                                    <li class="bg-black">
                                        <a class="hover:bg-white" href="{{ route('admin.register') }}">&nbsp<i class="fas fa-user-plus"></i>&nbsp
                                            Agregar
                                            administrador</a><br>
                                        <a class="hover:bg-white">&nbsp<i class="fas fa-user-edit"></i>&nbsp
                                            Modificar
                                            administrador</a><br>
                                        <a class="hover:bg-white">&nbsp<i class="fas fa-user-times"></i>&nbsp Eliminar
                                            egresado</a><br>
                                        <a class="hover:bg-white" href="#">&nbsp<i class="fas fa-user-check"></i>&nbsp
                                            Visualizar administrador</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li class="bg-black"><a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="hover:bg-white" href="{{ route('logout') }}">&nbsp<i
                                    class="fas fa-sign-out-alt"></i>&nbsp Cerrar sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
