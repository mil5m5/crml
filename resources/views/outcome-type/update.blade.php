@extends('layouts.main')
@section('title')
    Update Outcome Type
@endsection
@section('content')
    <form action="{{ route('outcome-type.update', $model->id) }}" method="post">
        @method('put')
        @include('outcome-type._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
