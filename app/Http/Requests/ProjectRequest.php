<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'client_id' => ['exists:App\Models\Client,id', 'required'],
            'currency_id' => ['exists:App\Models\Currency,id', 'required'],
            'salary_type' => ['integer', 'required'],
            'status' => ['integer', 'required'],
            'name' => ['string', 'required'],
            'finished_at' => 'integer',
            'paused_at' => 'integer',
            'salary_rate' => 'numeric',

        ];
    }
}
