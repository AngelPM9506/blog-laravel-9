@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">{{$titulo}}</h2>
    <section>
        <div class="row justify-content-md-center">
            <form action="{{route('login')}}" method="POST" class="formulario login col col-md-7">
                @include('dashboard.componentes.alertas')
                @csrf
                <div class="campo">
                    <label for="email">Correo</label>
                    <input type="text" name="email" id="email" placeholder="Tu correo" value="{{old('email', '')}}">
                </div>
                <div class="campo">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Tu contraseña">
                </div>
                <div class="campo remember clearfix">
                    <label for="remember_me">
                        <input type="checkbox" name="remember" id="remember_me">
                        <span>Recuerdame</span>
                    </label>
                </div>
                <div class="campo submit">
                        <a href="{{ route('register')}}">Aun no te registras?</a>
                        <a href="{{ route('password.request') }}">No recuerdas tu contraseña?</a>
                    <input type="submit" value="Iniciar sesión">
                </div>
            </form>
        </div>
    </section>
@endsection