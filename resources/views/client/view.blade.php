@extends('layouts.main')
@section('title')
    Client View
@endsection
@section('content')
<div>
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
</div>

<div>
    <h3 class="mt-5">Projects</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Salary Type</th>
            <th scope="col">Rate</th>
            <th scope="col">Currency</th>
            <th scope="col">Created At</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($model->projects as $project)
            <tr>
                <th>{{ $project->id }}</th>
                <td>{{ $project->name }}</td>
                <td>{{ $project->getStatusNames()[$project->status] }}</td>
                <td>{{ \App\Models\Project::getSalaryTypes()[$project->salary_type] }}</td>
                <td>{{ $project->rate }}</td>
                <td>{{ $project->currency_id }}</td>
                <td>{{ $project->created_at }}</td>
                <td>
                    @include('helpers.crud-buttons', ['id' => $project->id, 'url' => 'project'])
                </td>
                <td>
                    <a href="{{ route('incomeCreateWithProject', ['project_id' => $project->id]) }}">
                        <button class="btn btn-success">Create Income</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
@endsection
