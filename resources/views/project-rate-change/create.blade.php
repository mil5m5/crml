@extends('layouts.main')
@section('title')
    Create Project Rate Change
@endsection
@section('content')
    <h2>Create Project Rate Change</h2>
    <form action="{{ route('project-rate-change.store') }}" method="post">
        @include('project-rate-change._form')
        <button class="btn btn-success">Create</button>
    </form>
@endsection
