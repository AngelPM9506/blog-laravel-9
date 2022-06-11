@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">{{ $titulo }}</h2>
    <section>
        @include('dashboard.componentes.alertas')
        <form class="formulario container" action="{{ route('post.store') }}" method="post">
            @include('dashboard.post.formulario')
            <div class="campo submit">
                <input type="submit" value="Crear nueva entrada">
            </div>
        </form>
    </section>
@endsection
