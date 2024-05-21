<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMessengerRequest extends FormRequest
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
        $id = $this->input('id');

        return [
            'name' => ['required','string','max:75'],
            'last_name' => ['required','string','max:75'],
            'phone' => ['required','string','max:20',Rule::unique('messengers','phone')->ignore($id)],
            'email' => ['required','string','email',Rule::unique('messengers','email')->ignore($id)],
            'company' => ['nullable','string','max:50'],
            'company_phone' => ['nullable','string','max:20'],
        ];
    }
}
