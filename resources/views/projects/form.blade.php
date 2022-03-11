@csrf

@if ($project->image)
    <img class="card-img-top mb-2" style="height: 150px; object-fit:cover" src="/storage/{{ $project->image }}" alt="{{ $project->title }}">
@endif

<div class="mb-3">
    <input name="image" type="file" class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile">Selecciona el archivo</label>
</div>

<div class="form-group">
    <label for="category_id">Categoría del proyecto</label>
    <select name="category_id"
            id="category_id"
            class="form-control border-0 bg-light shadow-sm">

            <option value="">Seleccione</option>
            @foreach($categories as $id => $name)
                <option value="{{ $id }}" 
                    @if($id == old('category_id', $project->category_id)) selected @endif
                >{{ $name }}</option>
            @endforeach

    </select>
</div>

<div class="form-group">
    <label for="title">Nombre del proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" id="title" type="text" name="title"
        value="{{ old('title', $project->title) }}">
</div>

<div class="form-group">
    <label for="url">URL del proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" id="url" type=" text" name="url"
        value="{{ old('url', $project->url) }}">
</div>

<div class="form-group">
    <label for="description">Descripción del proyecto</label>
    <textarea class="form-control border-0 bg-light shadow-sm" id="description"
        name=" description">{{ old('description', $project->description) }}</textarea>
</div>
<div class="d-grid gap-2">
    <button class="btn btn-primary">{{ $btnText }}</button>
</div>
