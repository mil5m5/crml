@csrf
<div class="form-group">
    <label for="client-source-name">Name</label>
    <input id="client-source-name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text" value="{{ $model->name ?? '' }}">
</div>
