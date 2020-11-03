@extends('layouts.main')
@section('title')
    Create Project
@endsection
@section('content')
    <h2>Create Project</h2>
    <form action="{{ route('project.store') }}" method="post">
        @include('project._form')
        <button class="btn btn-success">Create</button>
    </form>
@endsection
