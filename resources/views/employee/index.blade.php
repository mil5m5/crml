@extends('layouts.main')
@section('title')
    Employees
@endsection

@section('content')
    <h1>Employees</h1>
    <a href="{{ route('employee.create') }}" type="button" class="btn btn-success">+ Create Employee</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Status</th>
                <th scope="col">Salary</th>
                <th scope="col">Currency</th>
                <th scope="col">Position</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($models as $model)
            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->name }}</td>
                <td>{{ $model->surname }}</td>
                <td>{{ \App\Models\Employee::getStatuses()[$model->status]}}</td>
                <td>{{ $model->salary }}</td>
                <td>{{ $model->currency->currency }}</td>
                <td>{{ $model->position->name }}</td>
                <td>{{ $model->created_at }}</td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('employee.show', $model->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('employee.edit', $model->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form action="{{route('employee.destroy', $model->id)}}" method="post" class="inline-block float-right" style="margin-left: 3px">
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
                <td class="text-gray">Employee Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
