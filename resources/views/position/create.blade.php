@extends('layouts.main')
@section('title')
    Create Client
@endsection
@section('content')
    <h2>Create Client</h2>
    <form action="{{ route('client.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="client-name">Name</label>
            <input id="client-name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text">
        </div>
        <div class="form-group">
            <label for="min_salary">Min Salary</label>
            <input id="min_salary" class="form-control form-control-sm @error('min_salary') is-invalid @enderror" name="min_salary" type="text">
        </div>
        <div class="form-group">
            <label for="max_salary">Max Salary</label>
            <input id="max_salary" class="form-control form-control-sm @error('max_salary') is-invalid @enderror" name="max_salary" type="text">
        </div>
            <div class="form-group">
                <label for="currency">Currency</label>
                <select id="currency" class="form-control form-control-sm @error('currency') is-invalid @enderror" name="currency">
                    <option disabled selected hidden>Choose Currency...</option>
                    @foreach(\App\Models\Currency::getCurrenciesList() as $key => $currency)
                        <option value="{{ $key }}">{{ $currency }}</option>
                    @endforeach
                </select>
            </div>
        <button class="btn btn-success">Create</button>
    </form>
@endsection
