@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                </div>
            </div>
            <body>
            <div id="app" class="content">
                <Example-component></Example-component><!--Añadimos nuestro componente vuejs-->
            </div>
            </body>
        </div>
    </div>
</div>
@endsection
