@extends('layouts.main')
@section('title')
    Create Income
@endsection
@section('content')
    <h2>Create Income</h2>
    <form action="{{ route('income.store') }}" method="post">
        @include('income._form', ['project_id' => $project_id])
        <button class="btn btn-success">Create</button>
    </form>
@endsection
