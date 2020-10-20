<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'position_id' => ['exists:App\Models\Position,id'],
            'currency_id' => ['exists:App\Models\Currency,id'],
            'name' => ['string', 'required'],
            'salary' => 'integer',
            'status' => 'integer',
        ];
    }
}
