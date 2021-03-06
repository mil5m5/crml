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
            <tr>
                <form method="get">
                    @csrf
                    <th scope="col"><input type="text" name="id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="name" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="min_salary" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="max_salary" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="currency_id" class="form-control form-control-sm"></th>
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
                <td>{{ $model->min_salary }}</td>
                <td>{{ $model->max_salary }}</td>
                <td>{{ $model->created_at }}</td>
                <td class="project-actions text-right">
                    @include('helpers.crud-buttons', ['id' => $model->id, 'url' => 'position'])
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
