<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NameChangeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:1|max:255',
        ];
    }
}
