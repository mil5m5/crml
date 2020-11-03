@extends('layouts.main')
@section('title')
    Outcome
@endsection

@section('content')
    <h1>Outcome</h1>
    <a href="{{ route('outcome.create') }}" type="button" class="btn btn-success">+ Create Outcome</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Notes</th>
                <th scope="col">Currency</th>
                <th scope="col">Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Is Paid</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <form method="get">
                    @csrf
                    <th scope="col"><input type="text" name="id" class="form-control form-control-sm"></th>
                    <th scope="col"></th>
                    <th scope="col"><input type="text" name="currency_id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="type" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="amount" class="form-control form-control-sm"></th>
                    <th scope="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text"  name="date"  class="form-control form-control-sm" id="reservation">
                        </div>
                    </th>
                    <th scope="col"><input type="text" name="is_paid" class="form-control form-control-sm"></th>
                    <th scope="col"><button class="d-none"></button></th>
                </form>
            </tr>
        </thead>
        <tbody>
            @forelse ($models as $model)

            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->notes }}</td>
                <td>{{ $model->currency->currency }}</td>
                <td>{{ $model->type }}</td>
                <td>{{ $model->amount }}</td>
                <td>{{ date('d.m.Y', $model->date) }}</td>
                <td>{{ $model->is_paid }}</td>
                <td class="project-actions text-right">
                    @include('helpers.crud-buttons', ['id' => $model->id, 'url' => 'outcome'])
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-gray">Outcome Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
