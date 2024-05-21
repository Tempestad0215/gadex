<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessengerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:75'],
            'last_name' => ['required','string','max:75'],
            'phone' => ['required','string','max:20','unique:messengers,phone'],
            'email' => ['required','string','email','unique:messengers,email'],
            'company' => ['nullable','string','max:50'],
            'company_phone' => ['nullable','string','max:20'],
        ];
    }
}
