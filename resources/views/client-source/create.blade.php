@extends('layouts.main')
@section('title')
    Create Client Sources
@endsection
@section('content')
    <h2>Create Client Source</h2>
    <form action="{{ route('client-source.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="client-source-name">Name</label>
            <input id="client-source-name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text">
        </div>
        <button class="btn btn-success">Create</button>
    </form>
@endsection
