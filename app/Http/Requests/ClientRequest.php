<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 */

class ClientRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'status' => ['required', 'integer'],
            'paused_at' => 'integer',
            'finished_at' => 'integer',
            'created_at' => 'integer',
            'updated_at' => 'integer',
            'client_source_id' => 'integer',
            'skype' => 'string',
            'email' => 'string',
            'phone' => 'string',
            'whatsapp' => 'string',
            'telegram' => 'string',
        ];
    }
}
