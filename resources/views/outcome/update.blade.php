@extends('layouts.main')
@section('title')
    Update Outcome
@endsection
@section('content')
    <form action="{{ route('outcome.update', $model->id) }}" method="post">
        @method('put')
        @include('outcome._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
