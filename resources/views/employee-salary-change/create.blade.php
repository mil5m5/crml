@extends('layouts.main')
@section('title')
    Create Employee Salary Change
@endsection
@section('content')
    <h2>Create Employee Salary Change</h2>
    <form action="{{ route('employee-salary-change.store') }}" method="post">
        @include('employee-salary-change._form')
        <button class="btn btn-success">Create</button>
    </form>
@endsection
