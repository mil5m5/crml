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
                <th scope="col"></th>
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
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('currency-exchange.show', $model->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('currency-exchange.edit', $model->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form action="{{route('currency-exchange.destroy', $model->id)}}" method="post" class="inline-block float-right" style="margin-left: 3px">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </button>
                    </form>
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
