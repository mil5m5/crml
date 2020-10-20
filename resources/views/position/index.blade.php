@extends('layouts.main')
@section('title')
    Position
@endsection

@section('content')
    <h1>Position</h1>
    <a href="{{ route('position.create') }}" type="button" class="btn btn-success">+ Create Position</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Min Salary</th>
                <th scope="col">Max Salary</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($models as $model)

            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->name }}</td>
                <td>{{ $model->min_salary }}</td>
                <td>{{ $model->max_salary }}</td>
                <td>{{ $model->created_at }}</td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('position.show', $model->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('position.edit', $model->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form action="{{route('position.destroy', $model->id)}}" method="post" class="inline-block float-right" style="margin-left: 3px">
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
                <td class="text-gray">Position Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
