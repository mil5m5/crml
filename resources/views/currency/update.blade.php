@extends('layouts.main')
@section('title')
    Update Currency
@endsection
@section('content')
    <form action="{{ route('currency.update', $model->id) }}" method="post">
        @method('put')
        @include('currency._form', ['model' => $model])

        <button class="btn btn-success">Update</button>
    </form>
@endsection
