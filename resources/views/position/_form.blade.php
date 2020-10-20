@extends('layouts.main')
@extends('client.create')
@section('_form')
    <form action="{{ route('client.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="client-name">Name</label>
            <input id="client-name" class="form-control @error('name') is-invalid @enderror" name="name" type="text">
        </div>
        <div class="form-group">
            <label for="client-status">Status</label>
            <select id="client-status" class="form-control  @error('status') is-invalid @enderror" name="status">
                <option value="" disabled selected hidden>Choose Status...</option>
                @foreach(\App\Models\Client::getStatusNames() as $key => $status)
                    <option value="{{ $key }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="client-source">Source</label>
            <select id="client-source" class="form-control  @error('source') is-invalid @enderror" name="client_source_id">
                <option value="" disabled selected hidden>Choose Source...</option>
                @foreach(\App\Models\ClientSource::clientSourceList() as $key => $source)
                    <option value="{{ $key }}">{{ $source }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="client-email">Email</label>
            <input id="client-email" class="form-control" name="email" type="text">
        </div>
        <div class="form-group">
            <label for="client-phone">Phone</label>
            <input id="client-phone" class="form-control" name="phone" type="text">
        </div>
        <div class="form-group">
            <label for="client-whatsapp">Whatsapp</label>
            <input id="client-whatsapp" class="form-control" name="whatsapp" type="text">
        </div>
        <div class="form-group">
            <label for="client-telegram">Telegram</label>
            <input id="client-telegram" class="form-control" name="telegram" type="text">
        </div>
        <div class="form-group">
            <label for="client-skype">Skype</label>
            <input id="client-skype" class="form-control" name="skype" type="text">
        </div>
        <button class="btn btn-success">ok</button>
    </form>
@endsection