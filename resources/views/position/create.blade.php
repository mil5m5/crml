@extends('layouts.main')
@section('title')
    Create Client
@endsection
@section('content')
    <h2>Create Client</h2>
    <form action="{{ route('client.store') }}" method="post">
        @include('client._form')
        <button class="btn btn-success">Create</button>
    </form>
@endsection
