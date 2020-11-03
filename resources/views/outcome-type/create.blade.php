@extends('layouts.main')
@section('title')
    Create Outcome Type
@endsection
@section('content')
    <h2>Create Outcome Type</h2>
    <form action="{{ route('outcome-type.store') }}" method="post">
        @include('outcome-type._form')
        <button class="btn btn-success">Create</button>
    </form>
@endsection
