@extends('layouts.main')
@section('title')
    Update Outcome Type
@endsection
@section('content')
    <form action="{{ route('outcome-type.update', $model->id) }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="client-source-name">Name</label>
            <input id="client-source-name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text" value="{{ $model->name ?? '' }}">
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection
