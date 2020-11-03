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
    <tr>
        <th>Paused At</th>
        <td>{{ $model->paused_at }}</td>
    </tr>
    <tr>
        <th>Finished At</th>
        <td>{{ $model->finished_at }}</td>
    </tr>
</table>

<div>
    <h3 class="mt-5">Project Credential</h3>
    <a href="{{ route('project-credential.create') }}">
        <button class="btn btn-success mb-2">+ Create Project Credential</button>
    </a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Credential Type</th>
            <th scope="col">Value</th>
            <th scope="col">Created At</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($model->projectCredentials as $projectCredential)
            <tr>
                <th>{{ $projectCredential->id }}</th>
                <th>{{ $projectCredential->credentialType->name }}</th>
                <th>{{ $projectCredential->value }}</th>
                <th>{{ date('d.m.Y', $projectCredential->created_at) }}</th>
                <th>
                    @include('helpers.crud-buttons', ['id' => $projectCredential->id, 'url' => 'project-credential'])
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <div>
        <h3 class="mt-5">Incomes</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Currency</th>
                <th scope="col">amount</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($model->incomes as $income)
                <tr>
                    <th>{{ $income->id }}</th>
                    <th>{{ $income->currency->currency }}</th>
                    <th>{{ $income->amount }}</th>
                    <th>{{ date('d.m.Y', $income->created_at) }}</th>
                    <th>
                        @include('helpers.crud-buttons', ['id' => $income->id, 'url' => 'income'])
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
