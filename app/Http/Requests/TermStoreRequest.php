<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TermStoreRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'name' => 'required|string',
            'code' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date'
        ];
    }
}
