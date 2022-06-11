@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">{{ $titulo }}</h2>
    <section>
        @include('dashboard.componentes.alertasCRUD')
        @if ($posts->count() === 0)
            <h3>No hay entradas Relacionadas</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('post.create') }}" class="btn btn-outline-primary">crear nueva entrada</a>
                <a href="{{ route('category.index') }}" class="btn btn-outline-primary">Regresar</a>
            </div>
        @else
            <h3>Entradas Relacionadas</h3>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Publicado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th>{{ $post->title }}</th>
                            <th>{{ $post->posted ? 'Si' : 'No' }}</th>
                            <th class="acciones">
                                <a class="btn btn-outline-success" href="{{ route('post.show', $post->id) }}">Ver</a>
                                <a class="btn btn-outline-warning" href="{{ route('post.edit', $post->id) }}">Editar</a>
                                <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Eliminar" class="btn btn-outline-danger">
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div><a href="{{route('post.create')}}" class="btn btn-outline-primary">Crear entrada</a></div>
                <div><a href="{{route('category.index')}}" class="btn btn-outline-primary">Categorias</a></div>
                {{ $posts->links() }}
            </div>
        @endif
    </section>
@endsection
