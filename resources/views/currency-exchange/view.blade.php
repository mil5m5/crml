@extends('layouts.main')
@section('title')
    Currency Exchange View
@endsection
@section('content')
    <h2>{{ $model->fromCurrency->currency . ' - ' . $model->toCurrency->currency}}</h2>
<table class="table table-sm table-striped mt-3">
    <tr>
        <th>ID</th>
        <td>{{ $model->id }}</td>
    </tr>
    <tr>
        <th>From Currency</th>
        <td>{{ $model->fromCurrency->currency }}</td>
    </tr>
    <tr>
        <th>To Currency</th>
        <td>{{ $model->toCurrency->currency }}</td>
    </tr>
    <tr>
        <th>Amount</th>
        <td>{{ $model->amount }}</td>
    </tr>
    <tr>
        <th>Rate</th>
        <td>{{ $model->rate }}</td>
    </tr>
    <tr>
        <th>Exchanged</th>
        <td>{{ $model->amounexchangedt }}</td>
    </tr>
    <tr>
        <th>Date</th>
        <td>{{ $model->date }}</td>
    </tr>
</table>
@endsection
