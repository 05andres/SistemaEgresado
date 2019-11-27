@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="w-full max-w-xs items-center" style="width: 300px;margin: 60px auto;">

            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="text-align: center;"  method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <i class="fas fa-graduation-cap fa-8x"></i>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold m b-2" for="username">
                        INICIO DE SESIÓN
                        <br><br>
                        <i class="fas fa-user"></i>
                        Username
                        <br>  
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror"
                        id="email" type="text" placeholder="Email" name="email" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        <i class="fas fa-key"></i>
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror"
                        id="password" type="password" name="password" placeholder="******************" required>
                    <!--<p class="text-red-500 text-xs italic">Please choose a password.</p>-->
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                        style="width: 150px;">
                        Sign In
                    </button>
                    @if (Route::has('password.request'))
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}"
                       style="text-align: right;">
                        ¿Olvidaste tu contraseña?
                    </a>
                    @endif
                </div>
            </form>
            <p class="text-center text-black-500 text-xs">
                &copy;2019 Acme Corp. All rights reserved.
            </p>
        </div>
    </div>
@endsection

