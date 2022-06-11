@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">{{ $titulo }}</h2>
    <section>
        @include('dashboard.componentes.alertas')
        <form class="formulario" action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @include('dashboard.post.formulario', ["task" => 'edit'])
            <div class="campo submit">
                <input type="submit" value="Guardar Cambios">
            </div>
        </form>
    </section>
@endsection
