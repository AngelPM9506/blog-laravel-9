@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">{{$titulo}}</h2>
    <section>
        @include('dashboard.componentes.alertas')
        <form action="{{route('category.store')}}" class="formulario container" method="POST">
            @include('dashboard.category.formulario')
            <div class="campo submit">
                <input type="submit" value="Crear nueva categoria">
            </div>
        </form>
    </section>
@endsection