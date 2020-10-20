@extends('layouts.main')
@section('title')
    Create Employee
@endsection
@section('content')
    <h2>Create Employee</h2>
    <form action="{{ route('employee.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="client-name">Name</label>
                    <input id="client-name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input id="surname" class="form-control form-control-sm @error('surname') is-invalid @enderror" name="surname" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-status">Status</label>
                    <select id="client-status" class="form-control form-control-sm @error('status') is-invalid @enderror" name="status">
                        <option value="" disabled selected hidden>Choose Status...</option>
                        @foreach(\App\Models\Employee::getStatuses() as $key => $status)
                            <option value="{{ $key }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-currency">Currency</label>
                    <select id="client-currency" class="form-control form-control-sm @error('currency_id') is-invalid @enderror" name="currency_id">
                        <option value="" disabled selected hidden>Choose Currency...</option>
                        @foreach(\App\Models\Currency::getCurrenciesList() as $key => $currency)
                            <option value="{{ $key }}">{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-position">Position</label>
                    <select id="client-position" class="form-control form-control-sm @error('position_id') is-invalid @enderror" name="position_id">
                        <option value="" disabled selected hidden>Choose Currency...</option>
                        @foreach(\App\Models\Position::getPositionsList() as $key => $position)
                            <option value="{{ $key }}">{{ $position }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="client-email">Email</label>
                    <input id="client-email" class="form-control form-control-sm" name="email" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="client-phone">Phone</label>
                    <input id="client-phone" class="form-control form-control-sm" name="phone" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-address">Address</label>
                    <input id="client-address" class="form-control form-control-sm" name="address" type="text">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-telegram">Telegram</label>
                    <input id="client-telegram" class="form-control form-control-sm" name="telegram" type="text">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-facebook">Facebool</label>
                    <input id="client-facebook" class="form-control form-control-sm" name="facebook" type="text">
                </div>
            </div>
        </div>
        <button class="btn btn-success">Create</button>
    </form>
@endsection
