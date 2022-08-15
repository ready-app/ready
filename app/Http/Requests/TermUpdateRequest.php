<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TermUpdateRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'name' => 'string',
            'code' => 'string',
            'start' => 'date',
            'end' => 'date'
        ];
    }
}
