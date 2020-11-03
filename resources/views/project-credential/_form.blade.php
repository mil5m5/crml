@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="project">Project</label>
            <select id="project" class="form-control form-control-sm @error('project_id') is-invalid @enderror" name="project_id">
                <option value="" disabled selected hidden>Choose Status...</option>
                @foreach(\App\Models\Project::getProjectsList() as $key => $project)
                    @if(isset($model) && ($model->project_id == $key))
                        <option selected value="{{ $key }}">{{ $project }}</option>
                    @else
                        <option value="{{ $key }}">{{ $project }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="credential_type_id">Credential Type</label>
            <select id="credential_type_id" class="form-control form-control-sm @error('credential_type_id') is-invalid @enderror" name="credential_type_id">
                <option value="" disabled selected hidden>Choose Source...</option>
                @foreach(\App\Models\ProjectCredentialType::getProjectCredentialTypesList() as $key => $credential_type)
                    @if(isset($model) && ($model->credential_type_id == $key))
                        <option selected value="{{ $key }}">{{ $credential_type }}</option>
                    @else
                        <option value="{{ $key }}">{{ $credential_type }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="value">Value</label>
    <input id="value" class="form-control form-control-sm" name="value" type="text" value="{{ $model->value ?? '' }}">
</div>
