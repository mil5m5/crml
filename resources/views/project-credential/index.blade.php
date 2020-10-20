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
                    <a class="btn btn-primary btn-sm" href="{{ route('project-credential.show', $model->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('project-credential.edit', $model->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form action="{{route('project-credential.destroy', $model->id)}}" method="post" class="inline-block float-right" style="margin-left: 3px">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </button>
                    </form>
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
