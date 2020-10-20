@extends('layouts.main')
@section('title')
    Client View
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
        <td>{{ $model->name }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ \App\Models\Project::getStatusNames()[$model->status] }}</td>
    </tr>
    <tr>
        <th>Salary Type</th>
        <td>{{ \App\Models\Project::getSalaryTypes()[$model->salary_type] }}</td>
    </tr>
    <tr>
        <th>Salary Rate</th>
        <td>{{ $model->salary_rate }}</td>
    </tr>
    <tr>
        <th>Client</th>
        <td>{{ $model->client->name }}</td>
    </tr>
    <tr>
        <th>Currency</th>
        <td>{{ $model->currency->currency }}</td>
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
