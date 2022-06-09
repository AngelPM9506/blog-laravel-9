@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">{{ $titulo }}</h2>
    <section>
        <div class="datos">
            <h3>Categoria: {{ $post->category_id }}</h3>
            <h3>Imagen: {{ $post->image }}</h3>
        </div>
        <article class="container contenido-post">
            {!! $post->content !!}
        </article>
    </section>
@endsection
