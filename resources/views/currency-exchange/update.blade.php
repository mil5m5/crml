@extends('layouts.main')
@section('title')
    Update Currency Exchange
@endsection
@section('content')
    <form action="{{ route('currency-exchange.update', $model->id) }}" method="post">
        @method('put')
        @include('currency-exchange._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
