@extends('layouts.main')
@section('title')
    Update Project Credential Type
@endsection
@section('content')
    <form action="{{ route('project-credential-type.update', $model->id) }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text" value="{{ $model->name ?? '' }}">
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection
