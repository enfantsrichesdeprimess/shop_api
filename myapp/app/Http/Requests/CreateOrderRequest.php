<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !empty(auth()->user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone' => 'required|string|max:11',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'order_number' => 'string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'НОМЕР ОБЬЯЗАТЕЛЬНЫЙ ГНИДА ЕБАННАЯ',
            'address.required' => 'И АДРЕС ТОЖЕ ОБЬЯЗАТЕЛЬНЫЙ',
            'email.required' => 'И ПОЧТА ТОЖЕ ОБЬЯЗАТЕЛЬНАЯ ТЫ ОБЕЗЬЯНА БЛЯТЬ'
        ];
    }
}
