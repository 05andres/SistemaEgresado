@extends('layouts.app')

@section('content')
<div class="container">
    <div class="w-full max-w-xs items-center" style="width: 300px;margin: 60px auto;">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 items-center" style="text-align: center;" method="POST" action="{{ route('password.email') }}"  >
            @csrf
            <i class="fas fa-graduation-cap fa-8x"></i>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="e-mail">
                    Restablecer contraseña
                </label>
                <p><br><i style="text-align: left;opacity: 0.7;">¿Olvidaste tu contraseña?. Introduzca su dirección de correo electrónico a continuación, y le enviaremos instrucciones para establecer una nueva.</i></p>
                <br><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email  @error('email') is-invalid @enderror" name="email"  name="gmail" type="email" placeholder="Your e-mail address" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="flex items-center justify-between" >
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" style="margin-left: auto;margin-right: auto; float: none;">
                    enviar
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                    Iniciar sesión
                </a>
            </div>
        </form>
        <p class="text-center text-black-500 text-xs">
            &copy;2019 Acme Corp. All rights reserved.
        </p>
    </div>
</div>
@endsection
