@extends('layouts.main')
@section('title')
    Income
@endsection

@section('content')
{{--    <x-date-buttons-widget></x-date-buttons-widget>--}}
    <h1>Incomes</h1>
    <a href="{{ route('income.create') }}" type="button" class="btn btn-success">+ Create Currency</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Notes</th>
                <th scope="col">Currency</th>
                <th scope="col">Project</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <form method="get">
                    @csrf
                    <th scope="col"><input type="text" name="id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="notes" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="currency_id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="project_id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="amount" class="form-control form-control-sm"></th>
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
                <td>{{ $model->notes }}</td>
                <td>{{ $model->currency->currency }}</td>
                <td>{{ $model->project->name }}</td>
                <td>{{ $model->amount }}</td>
                <td>{{ $model->date }}</td>
                <td class="project-actions text-right">
                    @include('helpers.crud-buttons', ['id' => $model->id, 'url' => 'income'])
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
