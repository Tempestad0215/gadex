<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateclientRequest extends FormRequest
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
            'name' => ['required','string','min:4','max:75'],
            'last_name' => ['required','string','min:4','max:75'],
            'email' => ['nullable','string','email',Rule::unique('clients','email')->ignore($id)],
            'phone' => ['nullable','string',Rule::unique('clients','phone')->ignore($id)],
        ];
    }
}
