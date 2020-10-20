@extends('layouts.main')
@section('title')
    Project Credential View
@endsection
@section('content')
    <h2>{{ $model->name}}</h2>
<table class="table table-sm table-striped mt-3">
    <tr>
        <th>ID</th>
        <td>{{ $model->id }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ $model->value }}</td>
    </tr>
    <tr>
        <th>Project</th>
        <td>{{ $model->project->name }}</td>
    </tr>
    <tr>
        <th>Project Credential</th>
        <td>{{ $model->credentialType->name }}</td>
    </tr>
    <tr>
        <th>Created At</th>
        <td>{{ $model->created_at }}</td>
    </tr>
    <tr>
        <th>Updated At</th>
        <td>{{ $model->updated_at }}</td>
    </tr>
</table>
@endsection
