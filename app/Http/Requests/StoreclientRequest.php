<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreclientRequest extends FormRequest
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
            'name' => ['required','string','min:4','max:75'],
            'last_name' => ['required','string','min:4','max:75'],
            'email' => ['nullable','string','email','unique:clients,email'],
            'phone' => ['nullable','string','unique:clients,phone'],
        ];
    }
}
