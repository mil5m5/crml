@extends('layouts.main')
@section('title')
    Create Project Credential
@endsection
@section('content')
    <h2>Create Project Credential</h2>
    <form action="{{ route('project-credential.store') }}" method="post">
        @include('project-credential._form')
        <button class="btn btn-success">Create</button>
    </form>
@endsection
