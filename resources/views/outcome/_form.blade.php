
@csrf
<div class="form-group">
    <label>Date:</label>
    <div class="input-group date" id="reservationdate" data-target-input="nearest">
        <input type="text" name="date" class="form-control datetimepicker-input @error('date') is-invalid @enderror" data-target="#reservationdate" value="{{ $model->date ?? '' }}"/>
        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">Amount</label>
            <input id="amount" class="form-control form-control-sm @error('amount') is-invalid @enderror" name="amount" type="text" value="{{ $model->amount ?? '' }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="client-currency">Currency</label>
            <select id="client-currency" class="form-control form-control-sm @error('currency_id') is-invalid @enderror" name="currency_id">
                <option value="" disabled selected hidden>Choose Currency...</option>
                @foreach(\App\Models\Currency::getCurrenciesList() as $key => $currency)
                    @if(isset($model) && ($model->currency_id == $currency))
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
    <label for="type">Type</label>
    <input id="type" class="form-control form-control-sm @error('amount') is-invalid @enderror" name="type" type="text">
</div>
<div class="form-group">
    <label for="notes">Notes</label>
    <textarea name="notes" id="notes" class="form-control form-control-sm @error('date') is-invalid @enderror" cols="30" rows="10">{{ $model->notes ?? '' }}</textarea>
</div>

<div class="custom-control custom-switch">
    <input type="checkbox" name="is_paid" class="custom-control-input" id="customSwitches">
    <label class="custom-control-label" for="customSwitches">Is Paid</label>
</div>
