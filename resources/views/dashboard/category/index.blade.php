@extends('layOut.pincipal')
@section('content')
    <h2 class="hoja-titulo">{{$titulo}}</h2>
    @include('dashboard.componentes.alertasCRUD')
    <section>
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoriess as $category)
                    <tr>
                        <th>{{$category->title}}</th>
                        <th class="acciones">
                            <a href="{{route('category.show', $category->id)}}" class="btn btn-outline-success" >Ver</a>
                            <a href="{{route('category.edit', $category->id)}}" class="btn btn-outline-warning" >Editar</a>
                            <form action="{{route('category.destroy', $category->id)}}" method="POST">
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
            <div>
                <a href="{{route('category.create')}}" class="btn btn-outline-primary">Categoria nueva</a>
            </div>
            {{ $categoriess->links() }}
        </div>
    </section>
@endsection