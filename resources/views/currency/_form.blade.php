@csrf
<div class="form-group">
    <label for="currency-name">Currency</label>
    <input id="currency" class="form-control form-control-sm @error('currency') is-invalid @enderror" name="currency" type="text" value="{{ $model->currency ?? '' }}">
</div>
<div class="form-group">
    <label for="symbol-name">Symbol</label>
    <input id="symbol" class="form-control form-control-sm @error('symbol') is-invalid @enderror" name="symbol" type="text" value="{{ $model->symbol ?? '' }}">
</div>
