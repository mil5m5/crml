@extends('layouts.main')
@section('title')
    Update Position
@endsection
@section('content')
    <form action="{{ route('position.update', $model->id) }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="client-name">Name</label>
            <input id="client-name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text"  value="{{ $model->name ?? '' }}">
        </div>
        <div class="form-group">
            <label for="min_salary">Min Salary</label>
            <input id="min_salary" class="form-control form-control-sm @error('min_salary') is-invalid @enderror" name="min_salary" type="text"  value="{{ $model->min_salary ?? '' }}">
        </div>
        <div class="form-group">
            <label for="max_salary">Max Salary</label>
            <input id="max_salary" class="form-control form-control-sm @error('max_salary') is-invalid @enderror" name="max_salary" type="text"  value="{{ $model->max_salary ?? '' }}">
        </div>
        <div class="form-group">
            <label for="currency">Currency</label>
            <select id="currency" class="form-control form-control-sm @error('currency') is-invalid @enderror" name="currency">
                <option disabled selected hidden>Choose Currency...</option>
                @foreach(\App\Models\Currency::getCurrenciesList() as $key => $currency)
                    @if($model->currency_id == $key)
                        <option selected value="{{ $key }}">{{ $currency }}</option>
                    @else
                        <option value="{{ $key }}">{{ $currency }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection
