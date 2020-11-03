@extends('layouts.main')
@section('title')
    Create currency
@endsection
@section('content')
    <h2>Create Currency</h2>
    <form action="{{ route('currency.store') }}" method="post">
        @include('currency._form')
        <button class="btn btn-success">Create</button>
    </form>
@endsection
