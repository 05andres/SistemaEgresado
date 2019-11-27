@extends('layouts.app')

@section('content')

<section class="break-words border-dashed border-2 border-blue-300 table p-8 mt-20 m-auto">

        @foreach($users as $user)
        <div class="align-top sm:inline-block md:inline-block lg:inline-block xl:floatleft border-2 border-black h-auto w-32 sm:h-auto sm:w-32 md:h-auto md:w-32 lg:h-auto lg:w-48 xl:h-auto xl:w-56 relative bg-blue-200"
            style="box-sizing: border-box;">

            <div
                class="mt-2 mx-auto block h-auto w-8 sm:h-auto sm:w-8 md:h-auto md:w-24 lg:h-auto lg xl:h-auto xl:w-40 relative">
                <img src="imagenes/user.jpg" alt="user">
            </div>
            <div class="relative text-center sm:text-lg md:text-xl lg:text-2xl xl:text-2xl">
                <h1></h1>
            </div>
            <div class="text-xs text-right sm:text-lg md:text-xl lg:text-2xl xl:text-2xl relative mr-4">
                <button id="user3" onclick="myFunction(this)"><i class="fas fa-user-edit "></i></button>
                <button id="user4"onclick="myFunction2(this)"><i class="fas fa-user-check "></i></button>
                <button id="btn-abrir-popupEliUser"><i class="fas fa-user-times"></i></button>
            </div>
        </div>
        @endforeach


        <!--
    -->
    </section>


    <!--Acá empiezan las popup-->

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


    <div class="overlay" id="overlay1">
        <div class="popup" id="popup1">
            <a href="#" id="btn-cerrar-popup1" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <h3>SUSCRIBETE</h3>
            <i class="fas fa-graduation-cap fa-8x"></i>
            <h4>Modificar usario oe gonorrea</h4>
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

    <script> function myFunction2(id){
                let btnAbrirPopup1 = id,
                overlay1 = document.getElementById('overlay1'),
                popup1 = document.getElementById('popup1'),
                btnCerrarPopup1 = document.getElementById('btn-cerrar-popup1');

                overlay1.classList.add('active');
                popup1.classList.add('active');


                btnCerrarPopup1.addEventListener('click', function(e){
                e.preventDefault();
                overlay1.classList.remove('active');
                popup1.classList.remove('active');
                });
                }</script>


@endsection
