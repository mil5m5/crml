<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'from_currency_id' => ['exists:App\Models\Currency,id', 'required'],
            'to_currency_id' => ['exists:App\Models\Currency,id', 'required'],
            'amount' => ['numeric', 'required'],
            'rate' => 'numeric',
            'exchanged' => 'numeric',
        ];
    }
}
