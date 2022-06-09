@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">{{ $titulo }}</h2>
    <section>
        @include('dashboard.componentes.alertas')
        <form class="formulario" action="{{ route('post.update', $post->id) }}" method="post">
            @method('PUT')
            @include('dashboard.post.formulario')
        </form>
    </section>
@endsection
