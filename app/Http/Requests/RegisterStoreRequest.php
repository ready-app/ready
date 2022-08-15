<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'email' => 'required|email|max:255',
            'name' => 'required|string|min:1|max:255',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
            'TOS_And_Privacy' => 'required|accepted'
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages() {
        return [
            'TOS_And_Privacy.accepted' => 'You must agree to the Terms of Service and Privacy Policy'
        ];
    }
}
