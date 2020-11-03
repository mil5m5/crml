@extends('layouts.main')
@section('title')
    Project Credential
@endsection

@section('content')
    <h1>Project Credential</h1>
    <a href="{{ route('project-credential.create') }}" type="button" class="btn btn-success">+ Create Project Credential</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Project</th>
                <th scope="col">Credential Type</th>
                <th scope="col">Value</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <form method="get">
                    @csrf
                    <th scope="col"><input type="text" name="id" class="form-control form-control-sm"></th>
                    <th scope="col">
                        <select class="form-control form-control-sm @error('project_id') is-invalid @enderror" name="project_id">
                            <option value="" disabled selected hidden>Choose Source...</option>
                            @foreach(\App\Models\Project::getProjectsList() as $key => $project)
                                <option value="{{ $key }}">{{ $project }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th scope="col">
                        <select class="form-control form-control-sm @error('credential_type_id') is-invalid @enderror" name="credential_type_id">
                            <option value="" disabled selected hidden>Choose Source...</option>
                            @foreach(\App\Models\ProjectCredentialType::getProjectCredentialTypesList() as $key => $credential_type)
                                <option value="{{ $key }}">{{ $credential_type }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th scope="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" name="created_at" class="form-control form-control-sm float-right" id="reservation" value=" ">
                        </div>
                    </th>
                    <th scope="col"><button class="d-none"></button></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </form>
            </tr>
        </thead>
        <tbody>
            @forelse ($models as $model)

            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->project->name }}</td>
                <td>{{ $model->credentialType->name }}</td>
                <td>{{ $model->value }}</td>
                <td>{{ $model->created_at }}</td>
                <td class="project-actions text-right">
                    @include('helpers.crud-buttons', ['id' => $model->id, 'url' => 'project-credential'])
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-gray">Project Credential Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
