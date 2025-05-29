<div class="mb-3">
    <label for="title" class="form-label">Títol</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $series->title ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="description" class="form-label">Descripció</label>
    <textarea class="form-control" id="description" name="description">{{ old('description', $series->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label for="portal" class="form-label">Portal</label>
    <input type="text" class="form-control" id="portal" name="portal" value="{{ old('portal', $series->portal ?? '') }}" required>
</div>
