<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoStoreRequest extends FormRequest
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
            'ra'        => 'required|string',
            'nome'       => 'required|string',
            'sala'       => 'nullable|string',
            'foto'       => 'file|nullable',
            'email' => 'nullable|string',
        ];
    }
}
