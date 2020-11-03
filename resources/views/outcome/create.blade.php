@extends('layouts.main')
@section('title')
    Create Outcome
@endsection
@section('content')
    <h2>Create Outcome</h2>
    <form action="{{ route('outcome.store') }}" method="post">
        @include('outcome._form')
        <button class="btn btn-success">Create</button>
    </form>
@endsection
