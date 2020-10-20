@extends('layouts.main')
@section('title')
    Project
@endsection

@section('content')
    <h1>Project</h1>
    <a href="{{ route('project.create') }}" type="button" class="btn btn-success">+ Create Project</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Salary Type</th>
                <th scope="col">Salary Rate</th>
                <th scope="col">Client</th>
                <th scope="col">Currency</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($models as $model)
            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->name }}</td>
                <td>{{ \App\Models\Project::getStatusNames()[$model->status] }}</td>
                <td>{{ \App\Models\Project::getSalaryTypes()[$model->salary_type] }}</td>
                <td>{{ $model->salary_rate }}</td>
                <td>{{ $model->client->name }}</td>
                <td>{{ $model->currency->currency }}</td>
                <td>{{ $model->created_at }}</td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('project.show', $model->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('project.edit', $model->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form action="{{route('project.destroy', $model->id)}}" method="post" class="inline-block float-right" style="margin-left: 3px">
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
                <td class="text-gray">Project Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
