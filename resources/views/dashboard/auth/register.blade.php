@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">{{ $titulo }}</h2>
    @include('dashboard.componentes.alertas')
    <section>
        <div class="row justify-content-md-center">
            <form action="{{route('register')}}" method="POST" class="formulario regis col col-md-8">
                @csrf
                <div class="campo">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" value="{{old('name','')}}"  placeholder="Tu numebre">
                </div>
                <div class="campo">
                    <label for="surname">Apellido:</label>
                    <input type="text" name="surname" id="surname" value="{{old('surname')}}"  placeholder="Tu apellido">
                </div>
                <div class="campo">
                    <label for="email">E-mail:</label>
                    <input type="text" name="email" id="email" value="{{old('email')}}"  placeholder="Tu E-mail">
                </div>
                <div class="campos-tex">
                    <div class="campo">
                        <label for="password">Contrasña:</label>
                        <input type="password" name="password" id="password"  placeholder="Contraseña">
                    </div>
                    <div class="campo">
                        <label for="conf_pass">Repite Contraseña</label>
                        <input type="password" name="password_confirmation" id="conf_pass"  placeholder="Repite tu contraseña">
                    </div>
                </div>
                <div class="campo submit">
                    <a href="{{ route('login')}}">Ya tienes cuenta? inicia sesión...</a>
                    <a href="{{ route('password.request') }}">No recuerdas tu contraseña?</a>
                    <input type="submit">
                </div>
            </form>
        </div>
    </section>
@endsection
