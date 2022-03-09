@csrf
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