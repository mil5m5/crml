@extends('layouts.main')
@section('title')
    Update Employee
@endsection
@section('content')
    <form action="{{ route('employee.update', $model->id) }}" method="post">
        @method('put')
        @include('employee._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
