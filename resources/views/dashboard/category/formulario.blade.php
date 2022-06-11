@csrf
<div class="campo">
    <label for="title">Titulo: </label>
    <input type="text" name="title" id="title" value="{{ old('title', $category->title) }}"
        placeholder="Titulo de categoria">
</div>
