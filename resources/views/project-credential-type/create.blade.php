@extends('layouts.main')
@section('title')
    Create Project Credential Type
@endsection
@section('content')
    <h2>Create Project Credential Type</h2>
    <form action="{{ route('project-credential-type.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text">
        </div>
        <button class="btn btn-success">Create</button>
    </form>
@endsection
