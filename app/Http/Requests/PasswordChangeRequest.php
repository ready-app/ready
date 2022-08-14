<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'password' => 'required|string|min:8',
            'NewPassword' => 'required|string|min:8',
            'ConfirmPassword' => 'required|string|same:NewPassword',
        ];
    }
}
