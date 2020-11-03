@extends('layouts.main')
@section('title')
    Create Employee
@endsection
@section('content')
    <h2>Create Employee</h2>
    <form action="{{ route('employee.store') }}" method="post">
        @include('employee._form')
        <button class="btn btn-success">Create</button>
    </form>
@endsection
