@extends('layouts.main')
@section('title')
    Update Client
@endsection
@section('content')
    <form action="{{ route('client.update', $model->id) }}" method="post">
        @method('put')

        @include('client._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
