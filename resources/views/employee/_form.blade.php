
@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="client-name">Name</label>
            <input id="client-name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text" value="{{ $model->name ?? '' }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="surname">Surname</label>
            <input id="surname" class="form-control form-control-sm @error('surname') is-invalid @enderror" name="surname" type="text" value="{{ $model->surname ?? '' }}">
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
                    @if(isset($model) && ($model->status == $key))
                        <option selected value="{{ $key }}">{{ $status }}</option>
                    @else
                        <option value="{{ $key }}">{{ $status }}</option>
                    @endif
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
                    @if(isset($model) && ($model->currency_id == $key))
                        <option selected value="{{ $key }}">{{ $currency }}</option>
                    @else
                        <option value="{{ $key }}">{{ $currency }}</option>
                    @endif
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
                    @if(isset($model) && ($model->position_id == $key))
                        <option selected value="{{ $key }}">{{ $position }}</option>
                    @else
                        <option value="{{ $key }}">{{ $position }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="client-email">Email</label>
            <input id="client-email" class="form-control form-control-sm" name="email" type="text" value="{{ $model->email ?? '' }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="client-phone">Phone</label>
            <input id="client-phone" class="form-control form-control-sm" name="phone" type="text" value="{{ $model->phone ?? '' }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="client-address">Address</label>
            <input id="client-address" class="form-control form-control-sm" name="address" type="text" value="{{ $model->address ?? '' }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="client-telegram">Telegram</label>
            <input id="client-telegram" class="form-control form-control-sm" name="telegram" type="text" value="{{ $model->telegram ?? '' }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="client-facebook">Facebool</label>
            <input id="client-facebook" class="form-control form-control-sm" name="facebook" type="text" value="{{ $model->facebook ?? '' }}">
        </div>
    </div>
</div>
