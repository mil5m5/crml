@extends('layouts.main')
@section('title')
    Update Project
@endsection
@section('content')
    <form action="{{ route('project.update', $model->id) }}" method="post">
        @method('put')
        @include('project._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
