@extends('layouts.main')
@section('title')
    Create Currency Exchange
@endsection
@section('content')
    <h2>Create Currency</h2>
    <form action="{{ route('currency-exchange.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="from-currency">From Currency</label>
                    <select id="from-currency" class="form-control form-control-sm @error('from_currency_id') is-invalid @enderror" name="from_currency_id">
                        <option value="" disabled selected hidden>Choose From Currency...</option>
                        @foreach(\App\Models\Currency::getCurrenciesList() as $key => $currency)
                            <option value="{{ $key }}">{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="to-currency">To Currency</label>
                    <select id="to-currency" class="form-control form-control-sm @error('to_currency_id') is-invalid @enderror" name="to_currency_id">
                        <option value="" disabled selected hidden>Choose To Currency...</option>
                        @foreach(\App\Models\Currency::getCurrenciesList() as $key => $currency)
                            <option value="{{ $key }}">{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input id="amount" class="form-control form-control-sm @error('amount') is-invalid @enderror" name="amount" type="text">
        </div>
        <div class="form-group">
            <label for="rate">Rate</label>
            <input id="rate" class="form-control form-control-sm @error('rate') is-invalid @enderror" name="rate" type="text" >
        </div>
        <div class="form-group">
            <label for="exchanged">Exchanged</label>
            <input id="exchanged" class="form-control form-control-sm @error('exchanged') is-invalid @enderror" name="exchanged" type="text">
        </div>
        <div class="form-group">
            <label>Date</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="date" class="form-control datetimepicker-input @error('date') is-invalid @enderror" data-target="#reservationdate"/>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <button class="btn btn-success">Create</button>
    </form>
@endsection
