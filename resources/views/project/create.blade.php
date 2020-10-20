@extends('layouts.main')
@section('title')
    Create Project
@endsection
@section('content')
    <h2>Create Project</h2>
    <form action="{{ route('project.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="salary-type">Salary Type</label>
                    <select id="salary-type" class="form-control form-control-sm @error('salary_type') is-invalid @enderror" name="salary_type">
                        <option value="" disabled selected hidden>Choose Salary Type...</option>
                        @foreach(\App\Models\Project::getSalaryTypes() as $key => $salaryType)
                            <option value="{{ $key }}">{{ $salaryType }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="salary-rate">Salary Rate</label>
                        <input id="salary-rate" class="form-control form-control-sm" name="salary_rate" type="text">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="client">Client</label>
            <select id="client" class="form-control form-control-sm @error('client_id') is-invalid @enderror" name="client_id">
                <option value="" disabled selected hidden>Choose Client...</option>
                @foreach(\App\Models\Client::getClientsList() as $key => $client)
                    <option value="{{ $key }}">{{ $client }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="currency">Currency</label>
            <select id="currency" class="form-control form-control-sm @error('currency_id') is-invalid @enderror" name="currency_id">
                <option value="" disabled selected hidden>Choose Currency...</option>
                @foreach(\App\Models\Currency::getCurrenciesList() as $key => $currency)
                    <option value="{{ $key }}">{{ $currency }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" class="form-control form-control-sm @error('status') is-invalid @enderror" name="status">
                <option value="" disabled selected hidden>Choose Salary Type...</option>
                @foreach(\App\Models\Project::getStatusNames() as $key => $status)
                    <option value="{{ $key }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Create</button>
    </form>
@endsection
