@extends('layouts.main')
@section('title')
    Currency
@endsection

@section('content')
    <h1>Currencies Exchange</h1>
    <a href="{{ route('currency-exchange.create') }}" type="button" class="btn btn-success">+ Create Currency</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">From Currency</th>
                <th scope="col">To Currency</th>
                <th scope="col">Amount</th>
                <th scope="col">Rate</th>
                <th scope="col">Exchange</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <form method="get">
                    @csrf
                    <th scope="col"><input type="text" name="id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="from_currency_id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="to_currency_id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="amount" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="rate" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="exchanged" class="form-control form-control-sm"></th>
                    <th scope="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" name="date" class="form-control form-control-sm float-right" id="reservation" value=" ">
                        </div>
                    </th>
                    <th scope="col"><button class="d-none"></button></th>
                </form>
            </tr>
        </thead>
        <tbody>
            @forelse ($models as $model)
            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->fromCurrency->currency }}</td>
                <td>{{ $model->toCurrency->currency }}</td>
                <td>{{ $model->amount }}</td>
                <td>{{ $model->rate }}</td>
                <td>{{ $model->exchange }}</td>
                <td>{{ $model->date }}</td>
                <td class="project-actions text-right">
                    @include('helpers.crud-buttons', ['id' => $model->id, 'url' => 'currency-exchange'])
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-gray">Currencies Exchange Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
