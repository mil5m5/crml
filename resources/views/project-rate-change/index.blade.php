@extends('layouts.main')
@section('title')
    Project Rate Change
@endsection

@section('content')
    <h1>Project Rate Change</h1>
    <a href="{{ route('project-rate-change.create') }}" type="button" class="btn btn-success">+ Create Project Rate Change</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Project</th>
                <th scope="col">New Rate</th>
                <th scope="col">Old Rate</th>
                <th scope="col">Comment</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($models as $model)
            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->project->name }}</td>
                <td>{{ $model->new_rate }}</td>
                <td>{{ $model->old_rate }}</td>
                <td>{{ $model->comment }}</td>
                <td>{{ $model->created_at }}</td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('project-rate-change.show', $model->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('project-rate-change.edit', $model->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form action="{{route('project-rate-change.destroy', $model->id)}}" method="post" class="inline-block float-right" style="margin-left: 3px">
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
                <td class="text-gray">Project Rate Change Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
