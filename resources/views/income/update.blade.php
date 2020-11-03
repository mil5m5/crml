@extends('layouts.main')
@section('title')
    Update Income
@endsection
@section('content')
    <form action="{{ route('income.update', $model->id) }}" method="post">
        @method('put')
        @include('income._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
