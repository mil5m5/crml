@extends('layouts.main')
@section('title')
    Create Currency Exchange
@endsection
@section('content')
    <h2>Create Currency</h2>
    <form action="{{ route('currency-exchange.store') }}" method="post">
        @include('currency-exchange._form')
        <button class="btn btn-success">Create</button>
    </form>
@endsection
