@extends('layouts.main')
@section('title')
    Update Employee Salary Change
@endsection
@section('content')
    <form action="{{ route('employee-salary-change.update', $model->id) }}" method="post">
        @method('put')
        @include('employee-salary-change._form', ['model' => $model])
        <button class="btn btn-success">Update</button>
    </form>
@endsection
