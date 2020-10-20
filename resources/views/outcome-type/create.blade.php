@extends('layouts.main')
@section('title')
    Create Outcome Type
@endsection
@section('content')
    <h2>Create Outcome Type</h2>
    <form action="{{ route('outcome-type.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="client-source-name">Name</label>
            <input id="client-source-name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text">
        </div>
        <button class="btn btn-success">Create</button>
    </form>
@endsection
