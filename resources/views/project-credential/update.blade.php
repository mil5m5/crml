@extends('layouts.main')
@section('title')
    Update Project Credential
@endsection
@section('content')
    <form action="{{ route('project-credential.update', $model->id) }}" method="post">
        @method('put')
        @include('project-credential._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
