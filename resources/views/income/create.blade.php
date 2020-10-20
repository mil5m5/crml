@extends('layouts.main')
@section('title')
    Create Income
@endsection
@section('content')
    <h2>Create Income</h2>
    <form action="{{ route('income.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Date:</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="date" class="form-control datetimepicker-input @error('date') is-invalid @enderror" data-target="#reservationdate"/>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input id="amount" class="form-control form-control-sm @error('amount') is-invalid @enderror" name="amount" type="text">
                </div>
            </div>
            <div class="col-md-6">
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
        </div>
        <div class="form-group">
            <label for="project">Project</label>
            <select id="project" class="form-control form-control-sm @error('project_id') is-invalid @enderror" name="project_id">
                <option value="" disabled selected hidden>Choose Currency...</option>
                @foreach(\App\Models\Project::getProjectsList() as $key => $project)
                    <option value="{{ $key }}">{{ $project }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="notes">Date</label>
            <textarea name="notes" id="notes" class="form-control form-control-sm @error('date') is-invalid @enderror" cols="30" rows="10"></textarea>
        </div>
        <button class="btn btn-success">Create</button>
    </form>
@endsection
