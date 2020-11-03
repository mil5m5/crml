@extends('layouts.main')
@section('title')
    Employee Salary Change
@endsection

@section('content')
    <h1>Employee Salary Change</h1>
    <a href="{{ route('employee-salary-change.create') }}" type="button" class="btn btn-success">+ Create Employee Salary Change</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Old Salary</th>
                <th scope="col">New Salary</th>
                <th scope="col">Comment</th>
                <th scope="col">Employee</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <form method="get">
                    @csrf
                    <th scope="col"><input type="text" name="id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="old_date" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="new_date" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="comment" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="employee_id" class="form-control form-control-sm"></th>
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
                <td>{{ $model->old_salary }}</td>
                <td>{{ $model->new_salary }}</td>
                <td>{{ $model->comment }}</td>
                <td>{{ $model->employee_id }}</td>
                <td>{{ $model->created_at }}</td>
                <td class="project-actions text-right">
                    @include('helpers.crud-buttons', ['id' => $model->id, 'url' => 'employee-salary-change'])
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-gray">Employee Salary Change Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
