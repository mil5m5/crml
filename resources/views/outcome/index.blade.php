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
                    <a class="btn btn-primary btn-sm" href="{{ route('outcome.show', $model->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('outcome.edit', $model->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form action="{{route('outcome.destroy', $model->id)}}" method="post" class="inline-block float-right" style="margin-left: 3px">
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
                <td class="text-gray">Outcome Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
