@extends('layouts.main')
@section('title')
    Update Project Rate Change
@endsection
@section('content')
    <form action="{{ route('project-rate-change.update', $model->id) }}" method="post">
        @method('put')
        @include('project-rate-change._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
