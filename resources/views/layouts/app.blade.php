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

    <ul id="app">
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
                                <!--href="{{ route('register.egre') }}"-->
                                <li class="bg-black">
                                    <button class="hover:bg-white" id="1" onclick="myFunction(this)">&nbsp<i class="fas fa-user-plus"></i>&nbsp
                                        Agregar
                                        egresado</button><br>
                                    <a class="hover:bg-white">&nbsp<i class="fas fa-user-edit"></i>&nbsp
                                        Modificar
                                        egresado</a><br>
                                    <a class="hover:bg-white">&nbsp<i class="fas fa-user-times"></i>&nbsp Eliminar
                                        egresado</a><br>
                                    <a class="hover:bg-white" href="{{ route('listusers.user') }}">&nbsp<i class="fas fa-user-check"></i>&nbsp
                                        Visualizar egresado</a>
                                </li>
                                @endif
                                @if (Auth::user()->isAdmin())
                                    <li class="bg-black">
                                        <a class="hover:bg-white" id="1" onclick="myFunction(this)">&nbsp<i class="fas fa-user-plus"></i>&nbsp
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
            </ul>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

    </div>

    <div class="overlay md:mt-0" id="overlay">
        <div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <h3>SUSCRIBETE</h3>
            <i class="fas fa-graduation-cap fa-8x"></i>
            <h4>Modificar usario Fernanda</h4>
            <form action="">
                <div class="contenedor-inputs">
                    <input type="text" placeholder="Nombre">
                    <input type="email" placeholder="Correo">
                </div>
                <input type="submit" class="btn-submit" value="Suscribirse">
            </form>
        </div>
    </div>

    <script >function myFunction(id){
                console.log(id);
                let btnAbrirPopup = id,
                overlay = document.getElementById('overlay'),
                popup = document.getElementById('popup'),
                btnCerrarPopup = document.getElementById('btn-cerrar-popup');
                console.log(btnAbrirPopup)
                overlay.classList.add('active');
                popup.classList.add('active');


                btnCerrarPopup.addEventListener('click', function(e){
                e.preventDefault();
                overlay.classList.remove('active');
                popup.classList.remove('active');
                });
                }
    </script>

</body>
</html>
