@extends('layouts.main')
@section('title')
    Currency
@endsection

@section('content')
    <h1>Currencies</h1>
    <a href="{{ route('currency.create') }}" type="button" class="btn btn-success">+ Create Currency</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Currency</th>
                <th scope="col">Symbol</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <form method="get">
                    @csrf
                    <th scope="col"><input type="text" name="id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="currency" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="symbol" class="form-control form-control-sm"></th>
                    <th scope="col"><button class="d-none"></button></th>
                </form>
            </tr>
        </thead>
        <tbody>
            @forelse ($models as $model)

            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->currency }}</td>
                <td>{{ $model->symbol }}</td>
                <td class="project-actions text-right">
                    @include('helpers.crud-buttons', ['id' => $model->id, 'url' => 'currency'])
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-gray">Currencies Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
