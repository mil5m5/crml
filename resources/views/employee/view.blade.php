@extends('layouts.main')
@section('title')
    Employee View
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
        <th>Surname</th>
        <td>{{ $model->surname }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ \App\Models\Employee::getStatuses()[$model->status] }}</td>
    </tr>
    <tr>
        <th>Salary</th>
        <td>{{ $model->salary }}</td>
    </tr>
    <tr>
        <th>Currency</th>
        <td>{{ $model->currency->currency }}</td>
    </tr>
    <tr>
        <th>Position</th>
        <td>{{ $model->porition->name }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $model->address }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $model->email }}</td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>{{ $model->phone }}</td>
    </tr>
    <tr>
        <th>Whatsapp</th>
        <td>{{ $model->whatsapp }}</td>
    </tr>
    <tr>
        <th>Telegram</th>
        <td>{{ $model->telegram }}</td>
    </tr>
    <tr>
        <th>Facebook</th>
        <td>{{ $model->skype }}</td>
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
