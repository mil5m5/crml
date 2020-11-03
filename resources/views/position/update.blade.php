@extends('layouts.main')
@section('title')
    Update Position
@endsection
@section('content')
    <form action="{{ route('position.update', $model->id) }}" method="post">
        @method('put')
        @include('client._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
