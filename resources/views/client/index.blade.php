@extends('layouts.main')
@section('title')
    Clients
@endsection

@section('content')
    <h3>Clients</h3>
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
                    <th scope="col"><input type="text" name="id" class="form-control form-control-sm"></th>
                    <th scope="col"><input type="text" name="name" class="form-control form-control-sm"></th>
                    <th scope="col">
                        <select class="form-control form-control-sm @error('status') is-invalid @enderror" name="status">
                            <option value="" disabled selected hidden>Choose Status...</option>
                            @foreach(\App\Models\Client::getStatusNames() as $key => $status)
                                <option value="{{ $key }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th scope="col">
                        <select id="client-source" class="form-control form-control-sm @error('source') is-invalid @enderror" name="client_source_id">
                            <option value="" disabled selected hidden>Choose Source...</option>
                            @foreach(\App\Models\ClientSource::clientSourceList() as $key => $source)
                                <option value="{{ $key }}">{{ $source }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th scope="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" name="created_at" class="form-control form-control-sm float-right" id="reservation" value=" ">
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
                <td>{{ $model->name }}</td>
                <td>{{ \App\Models\Client::getStatusNames()[$model->status] }}</td>
                <td>{{ $model->clientSource->name }}</td>
                <td>{{ date('d.m.Y', $model->created_at) }}</td>
                <td class="project-actions text-right">
                    @include('helpers.crud-buttons', ['id' => $model->id, 'url' => 'client'])
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
