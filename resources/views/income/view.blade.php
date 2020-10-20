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
        <td>{{ $model->currency->currency }}</td>
    </tr>
    <tr>
        <th>Product</th>
        <td>{{ $model->product->name }}</td>
    </tr>
    <tr>
        <th>Amount</th>
        <td>{{ $model->amount }}</td>
    </tr>
    <tr>
        <th>Date</th>
        <td>{{ $model->date }}</td>
    </tr>
</table>
@endsection
