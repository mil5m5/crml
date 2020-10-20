@extends('layouts.main')
@section('title')
    Update Client Sources
@endsection
@section('content')
    <form action="{{ route('client-source.update', $model->id) }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="client-source-name">Name</label>
            <input id="client-source-name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text" value="{{ $model->name ?? '' }}">
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection
