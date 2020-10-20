@extends('layouts.main')
@section('title')
    Outcome View
@endsection
@section('content')
    <h2>{{ $model->type}}</h2>
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
        <td>{{ $model->type }}</td>
    </tr>
    <tr>
        <th>Amount</th>
        <td>{{ $model->amount }}</td>
    </tr>
    <tr>
        <th>Date</th>
        <td>{{ date('d.m.Y', $model->date) }}</td>
    </tr>
    <tr>
        <th>Is Paid</th>
        <td>{{ $model->is_paid }}</td>
    </tr>
    <tr>
        <th>Paid At</th>
        <td>{{ date('d.m.Y', $model->paid_at) }}</td>
    </tr>
    <tr>
        <th>Created At</th>
        <td>{{ $model->created_at }}</td>
    </tr>
    <tr>
        <th>Updated At</th>
        <td>{{ $model->updated_at }}</td>
    </tr>
</table>
@endsection
