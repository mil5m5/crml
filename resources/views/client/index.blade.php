@extends('layouts.main')
@section('title')
    Clients
@endsection

@section('content')
    <h1>Clients</h1>
    <a href="{{ route('client.create') }}" type="button" class="btn btn-success">+ Create Client</a>
    <table class="table table-sm table-bordered mt-3" style="background: white">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Client Source</th>
                <th scope="col">Created At</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <form method="get">
                    @csrf
                    <th scope="col"><input type="text" name="id" class="form-control"></th>
                    <th scope="col"><input type="text" name="name" class="form-control"></th>
                    <th scope="col"><input type="text" name="status" class="form-control"></th>
                    <th scope="col"><input type="text" name="client_source" class="form-control"></th>
                    <th scope="col"><input type="text" name="created_at" class="form-control"></th>
                    <th scope="col"><button id="client-search">Send</button></th>
                </form>
            </tr>
        </thead>
        <tbody>
            @forelse ($models as $model)

            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->name }}</td>
                <td>{{ \App\Models\Client::getStatusNames()[$model->status] }}</td>
                <td>{{ $model->clientSource->name }}</td>
                <td>{{ $model->created_at }}</td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('client.show', $model->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('client.edit', $model->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form action="{{route('client.destroy', $model->id)}}" method="post" class="inline-block float-right" style="margin-left: 3px">
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
                <td class="text-gray">Clients Table is Empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
