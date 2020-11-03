@extends('layouts.main')
@section('title')
    Create Client Sources
@endsection
@section('content')
    <h2>Create Client Source</h2>
    <form action="{{ route('client-source.store') }}" method="post">
        @csrf
        @include('client-source._form')
        <button class="btn btn-success">Create</button>
    </form>
@endsection
