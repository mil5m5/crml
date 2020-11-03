@extends('layouts.main')
@section('title')
    Update Project Credential Type
@endsection
@section('content')
    <form action="{{ route('project-credential-type.update', $model->id) }}" method="post">
        @method('put')
        @include('project-credential-type._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
