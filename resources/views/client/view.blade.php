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
        <td>{{ \App\Models\Client::getStatusNames()[$model->status] }}</td>
    </tr>
    <tr>
        <th>Client Source</th>
        <td>{{ $model->clientSource->name }}</td>
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
        <th>Skype</th>
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
