<?php

namespace App\Http\Requests;

use App\User;
use App\ProcessModel;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProcessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'process_id' => [
                'required', 'min:3'
            ],
            'process_name' => [
                'required', 'min:3'
            ],
            'description' => [
                'required', 'min:3'
            ],
            'departamento' => [
                'required', 'min:1'
            ],
            'municipio' => [
                'required', 'min:1'
            ]
        ];
    }
    
}
