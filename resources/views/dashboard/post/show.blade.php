@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">{{ $titulo }}</h2>
    <section>
        @include('dashboard.componentes.alertasCRUD')
        <div class="datos">
            <h3>Categoria: {{ $post->category->title }}</h3>
            <h3>Imagen: {{ $post->image }}</h3>
        </div>
        <article class="container contenido-post">
            {!! $post->content !!}
        </article>
    </section>
@endsection
