@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input id="name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text" value="{{ $model->name ?? '' }}">
</div>
