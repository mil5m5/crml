@extends('layouts.main')
@section('title')
    Project
@endsection

@section('content')
    <h1>Project</h1>
    <a href="{{ route('project.create') }}" type="button" class="btn btn-success">+ Create Project</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Salary Type</th>
                <th scope="col">Salary Rate</th>
                <th scope="col">Client</th>
                <th scope="col">Currency</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <form method="get">
                    @csrf
                    <th scope="col"><input type="text" name="id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="name" class="form-control form-control-sm"></th>
                    <th scope="col">
                        <select id="status" class="form-control form-control-sm @error('status') is-invalid @enderror" name="status">
                            <option value="" disabled selected hidden>Choose Salary Type...</option>
                            @foreach(\App\Models\Project::getStatusNames() as $key => $status)
                                <option value="{{ $key }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th scope="col">
                        <select id="salary-type" class="form-control form-control-sm @error('salary_type') is-invalid @enderror" name="salary_type">
                            <option value="" disabled selected hidden>Choose Salary Type...</option>
                            @foreach(\App\Models\Project::getSalaryTypes() as $key => $salaryType)
                                <option value="{{ $key }}">{{ $salaryType }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th scope="col"><input type="text" name="salary_rate" class="form-control form-control-sm"></th>
                    <th scope="col">
                        <select id="client" class="form-control form-control-sm @error('client_id') is-invalid @enderror" name="client_id">
                            <option value="" disabled selected hidden>Choose Client...</option>
                            @foreach(\App\Models\Client::getClientsList() as $key => $client)
                                <option value="{{ $key }}">{{ $client }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th scope="col">
                        <select id="currency" class="form-control form-control-sm @error('currency_id') is-invalid @enderror" name="currency_id">
                            <option value="" disabled selected hidden>Choose Currency...</option>
                            @foreach(\App\Models\Currency::getCurrenciesList() as $key => $currency)
                                <option value="{{ $key }}">{{ $currency }}</option>
                            @endforeach
                        </select>
                    </th>
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
                <td>{{ \App\Models\Project::getStatusNames()[$model->status] }}</td>
                <td>{{ \App\Models\Project::getSalaryTypes()[$model->salary_type] }}</td>
                <td>{{ $model->salary_rate }}</td>
                <td>{{ $model->client->name }}</td>
                <td>{{ $model->currency->currency }}</td>
                <td>{{ $model->created_at }}</td>
                <td class="project-actions text-right">
                    @include('helpers.crud-buttons', ['id' => $model->id, 'url' => 'project'])
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-gray">Project Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
