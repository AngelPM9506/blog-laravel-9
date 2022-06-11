@csrf
<div class="campo">
    <label for="title">Titulo:</label>
    <input type="text" name="title" id="title" placeholder="Titulo" value="{{ old('title', $post->title) }}">
</div>
@if (isset($task) && $task === 'edit')
    <div class="container">
        <div class="campo input-group">
            <label class="input-group-text" for="image">Imagen: </label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
    </div>
@endif
<div class="campos-tex">
    <div class="campo">
        <label for="category">Categoria:</label>
        <select name="category_id" id="category">
            <option value="">Categoría</option>
            @foreach ($categories as $title => $id)
                <option {{ old('category_id', $post->category_id) == $id ? 'selected' : '' }}
                    value="{{ $id }}">{{ $title }}</option>
            @endforeach
        </select>
    </div>
    <div class="campo">
        <label for="posted">Publicar</label>
        <select name="posted" id="posted">
            <option value=0 {{ old('posted', $post->posted) == 0 ? 'selected' : '' }}>No</option>
            <option value=1 {{ old('posted', $post->posted) == 1 ? 'selected' : '' }}>Si</option>
        </select>
    </div>
</div>
<div class="campo textarea">
    <label for="description">Descripción</label>
    <textarea id="editor-description" name="description"> {{ old('description', $post->description) }}  </textarea>
</div>
<div class="campo textarea">
    <label for="content">Contenido</label>
    <textarea name="content" id="editor-content"> {{ old('content', $post->content) }} </textarea>
</div>
