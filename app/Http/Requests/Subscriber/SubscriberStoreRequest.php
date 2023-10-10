<?php

namespace App\Http\Requests\Subscriber;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255|unique:subscribers,email'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute обов\'язкове.',
            'unique' => 'Значення з поля :attribute вже є в списку розсилки.',
        ];
    }
}
