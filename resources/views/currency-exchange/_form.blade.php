@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="from-currency">From Currency</label>
            <select id="from-currency" class="form-control form-control-sm @error('from_currency_id') is-invalid @enderror" name="from_currency_id">
                <option value="" disabled selected hidden>Choose From Currency...</option>
                @foreach(\App\Models\Currency::getCurrenciesList() as $key => $currency)
                    @if (isset($model) && ($key == $model->from_currency_id))
                        <option selected value="{{ $key }}">{{ $currency }}</option>
                    @else
                        <option value="{{ $key }}">{{ $currency }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="to-currency">To Currency</label>
            <select id="to-currency" class="form-control form-control-sm @error('to_currency_id') is-invalid @enderror" name="to_currency_id" >
                <option value="" disabled selected hidden>Choose To Currency...</option>
                @foreach(\App\Models\Currency::getCurrenciesList() as $key => $currency)
                    @if ( isset($model) && ($key == $model->to_currency_id))
                        <option selected value="{{ $key }}">{{ $currency }}</option>
                    @else
                        <option value="{{ $key }}">{{ $currency }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="currencyexchange-amount">Amount</label>
    <input id="currencyexchange-amount" class="form-control form-control-sm @error('amount') is-invalid @enderror" name="amount" type="text" value="{{ $model->amount ?? '' }}">
</div>
<div class="form-group">
    <label for="currencyexchange-rate">Rate</label>
    <input id="currencyexchange-rate" class="form-control form-control-sm @error('rate') is-invalid @enderror" name="rate" type="text" value="{{ $model->rate ?? '' }}">
</div>
<div class="form-group">
    <label for="currencyexchange-exchanged">Exchanged</label>
    <input id="currencyexchange-exchanged" class="form-control form-control-sm @error('exchanged') is-invalid @enderror" name="exchanged" type="text" value="{{ $model->exchanged ?? '' }}">
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
