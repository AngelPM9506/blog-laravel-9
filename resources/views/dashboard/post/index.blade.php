@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">Index post</h2>
    <section>
        @if (session('status'))
            <div class="alert alert-danger text-center" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Publicado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th>{{ $post->title }}</th>
                        <th>{{ $post->category->title }}</th>
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
        <div class="d-flex justify-content-end">
            {{ $posts->links() }}
        </div>
    </section>
@endsection
