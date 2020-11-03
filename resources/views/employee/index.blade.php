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
                <th scope="col">Status</th>
                <th scope="col">Salary</th>
                <th scope="col">Currency</th>
                <th scope="col">Position</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <form method="get">
                    @csrf
                    <th scope="col"><input type="text" name="id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="name" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="status" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="salary" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="currency_id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="position_id" class="form-control form-control-sm"></th>
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
                </form>
            </tr>
        </thead>
        <tbody>
            @forelse ($models as $model)
            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->name }}</td>
                <td>{{ \App\Models\Employee::getStatuses()[$model->status]}}</td>
                <td>{{ $model->salary }}</td>
                <td>{{ $model->currency->currency }}</td>
                <td>{{ $model->position->name }}</td>
                <td>{{ $model->created_at }}</td>
                <td class="project-actions text-right">
                    @include('helpers.crud-buttons', ['id' => $model->id, 'url' => 'employee'])
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
