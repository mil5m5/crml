@extends('layouts.main')
@section('title')
    Project Credential Type
@endsection

@section('content')
    <h1>Project Credential Type</h1>
    <a href="{{ route('project-credential-type.create') }}" type="button" class="btn btn-success">+ Create Project Credential Type</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <form method="get">
                    @csrf
                    <th scope="col"><input type="text" name="id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="name" class="form-control form-control-sm"></th>
                    <th scope="col"><button class="d-none"></button></th>
                </form>
            </tr>
        </thead>
        <tbody>
            @forelse ($models as $model)

            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->name }}</td>
                <td class="project-actions text-right">
                    @include('helpers.crud-buttons', ['id' => $model->id, 'url' => 'project-credential-type'])

                </td>
            </tr>
            @empty
            <tr>
                <td class="text-gray">Project Credential Type Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
