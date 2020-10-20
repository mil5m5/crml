@extends('layouts.main')
@section('title')
    Create currency
@endsection
@section('content')
    <h2>Create Currency</h2>
    <form action="{{ route('currency.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="currency-name">Currency</label>
            <input id="currency-name" class="form-control form-control-sm @error('currency') is-invalid @enderror" name="currency" type="text">
        </div>
        <div class="form-group">
            <label for="symbol-name">Symbol</label>
            <input id="symbol-name" class="form-control form-control-sm @error('symbol') is-invalid @enderror" name="symbol" type="text">
        </div>
        <button class="btn btn-success">Create</button>
    </form>
@endsection
