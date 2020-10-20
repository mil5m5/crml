@extends('layouts.main')
@section('title')
    Currency View
@endsection
@section('content')
    <h2>{{ $model->currency}}</h2>
<table class="table table-sm table-striped mt-3">
    <tr>
        <th>ID</th>
        <td>{{ $model->id }}</td>
    </tr>
    <tr>
        <th>Currency</th>
        <td>{{ $model->currency }}</td>
    </tr>
    <tr>
        <th>Symbol</th>
        <td>{{ $model->symbol }}</td>
    </tr>
</table>
@endsection
