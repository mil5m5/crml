@extends('layouts.main')
@section('title')
    Create Project Credential Type
@endsection
@section('content')
    <h2>Create Project Credential Type</h2>
    <form action="{{ route('project-credential-type.store') }}" method="post">
        @include('project-credential-type._form')
        <button class="btn btn-success">Create</button>
    </form>
@endsection
