@extends('layouts.main')
@section('title')
    Outcome Type View
@endsection
@section('content')
    <h2>{{ $model->name}}</h2>
<table class="table table-sm table-striped mt-3">
    <tr>
        <th>ID</th>
        <td>{{ $model->id }}</td>
    </tr>
    <tr>
        <th>Old Date</th>
        <td>{{ $model->old_date }}</td>
    </tr>
    <tr>
        <th>New Date</th>
        <td>{{ $model->new_date }}</td>
    </tr>
    <tr>
        <th>Comment</th>
        <td>{{ $model->comment }}</td>
    </tr>
    <tr>
        <th>Employee</th>
        <td>{{ $model->Employee_id }}</td>
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
