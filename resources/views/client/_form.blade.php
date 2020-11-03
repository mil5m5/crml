@csrf
<div class="form-group">
    <label for="client-name">Name</label>
    <input id="client-name" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" type="text" value="{{ $model->name ?? '' }}">
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="client-status">Status</label>
            <select id="client-status" class="form-control form-control-sm @error('status') is-invalid @enderror" name="status">
                <option value="" disabled selected hidden>Choose Status...</option>
                @foreach(\App\Models\Client::getStatusNames() as $key => $status)
                    @if(isset($model) && ($model->status == $key))
                        <option selected value="{{ $key }}">{{ $status }}</option>
                    @else
                        <option value="{{ $key }}">{{ $status }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="client-source">Source</label>
            <select id="client-source" class="form-control form-control-sm @error('source') is-invalid @enderror" name="client_source_id">
                <option value="" disabled selected hidden>Choose Source...</option>
                @foreach(\App\Models\ClientSource::clientSourceList() as $key => $source)
                    @if(isset($model) && ($model->client_source_id == $key))
                        <option selected value="{{ $key }}">{{ $source }}</option>
                    @else
                        <option value="{{ $key }}">{{ $source }}</option>
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
            <label for="client-whatsapp">Whatsapp</label>
            <input id="client-whatsapp" class="form-control form-control-sm" name="whatsapp" type="text" value="{{ $model->whatsapp ?? '' }}">
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
            <label for="client-skype">Skype</label>
            <input id="client-skype" class="form-control form-control-sm" name="skype" type="text" value="{{ $model->skype ?? '' }}">
        </div>
    </div>
</div>
