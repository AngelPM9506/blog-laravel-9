@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">{{ $titulo }}</h2>
    <section>
        <div class="row justify-content-md-center">
            <form action="{{ route('password.email') }}" method="POST" class="formulario regis col col-md-8">
                @include('dashboard.componentes.alertas')
                @csrf
                <div class="campo">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="El email de registro">
                </div>
                <div class="campo submit justify-content-end">
                    <input type="submit" value="Enviar recuperación">
                </div>
            </form>
        </div>
    </section>
@endsection
