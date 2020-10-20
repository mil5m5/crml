@extends('layouts.main')
@section('title')
    Update Project
@endsection
@section('content')
    <form action="{{ route('project.update', $model->id) }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text" {{ $model->name ?? '' }}>
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
                        <input id="salary-rate" class="form-control form-control-sm" name="salary_rate" type="text" {{ $model->salary_rate ?? '' }}>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="client">Client</label>
            <select id="client" class="form-control form-control-sm @error('status') is-invalid @enderror" name="client">
                <option value="" disabled selected hidden>Choose Client...</option>
                @foreach(\App\Models\Client::getClientsList() as $key => $client)
                    @if($model->client_id == $key)
                        <option selected value="{{ $key }}">{{ $client }}</option>
                    @else
                        <option value="{{ $key }}">{{ $client }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="currency">Currency</label>
            <select id="currency" class="form-control form-control-sm @error('currency_id') is-invalid @enderror" name="currency_id">
                <option value="" disabled selected hidden>Choose Currency...</option>
                @foreach(\App\Models\Currency::getCurrenciesList() as $key => $currency)
                    @if($model->currency_id == $key)
                        <option selected value="{{ $key }}">{{ $currency }}</option>
                    @else
                        <option value="{{ $key }}">{{ $currency }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" class="form-control form-control-sm @error('status') is-invalid @enderror" name="status">
                <option value="" disabled selected hidden>Choose Status...</option>
                @foreach(\App\Models\Project::getStatusNames() as $key => $status)
                    @if($model->status == $key)
                        <option selected value="{{ $key }}">{{ $status }}</option>
                    @else
                        <option value="{{ $key }}">{{ $status }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection
