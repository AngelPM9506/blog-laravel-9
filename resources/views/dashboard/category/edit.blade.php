@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">{{$titulo}}</h2>
    <section>
        @include('dashboard.componentes.alertas')
        <form action="{{route('category.update', $category->id)}}" class="formulario container" method="POST">
            @method('PUT')
            @include('dashboard.category.formulario')
            <div class="campo submit">
                <input type="submit" value="Actualizar categoria">
            </div>
        </form>
    </section>
@endsection