@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="old_rate">Old Rate</label>
            <input id="old_rate" class="form-control form-control-sm @error('old_rate') is-invalid @enderror" name="old_rate" type="text" value="{{ $model->old_rate ?? '' }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="new_rate">New Rate</label>
            <input id="new_rate" class="form-control form-control-sm @error('new_rate') is-invalid @enderror" name="new_rate" type="text" value="{{ $model->new_rate ?? '' }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="project">Project</label>
    <select id="project" class="form-control form-control-sm @error('project_id') is-invalid @enderror" name="project_id">
        <option value="" disabled selected hidden>Choose Project...</option>
        @foreach(\App\Models\Project::getProjectsList() as $key => $project)
            @if(isset($model) && ($model->project_id == $key))
                <option selected value="{{ $key }}">{{ $project }}</option>
            @else
                <option value="{{ $key }}">{{ $project }}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="comment">Comment</label>
    <textarea name="comment" class="form-control form-control-sm @error('comment') is-invalid @enderror"  id="comment" cols="30" rows="10">{{ $model->comment ?? '' }}</textarea>
</div>
