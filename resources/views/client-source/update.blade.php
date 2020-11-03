@extends('layouts.main')
@section('title')
    Update Client Sources
@endsection
@section('content')
    <form action="{{ route('client-source.update', $model->id) }}" method="post">
        @method('put')

        @include('client-source._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
