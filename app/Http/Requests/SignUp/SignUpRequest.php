<?php

namespace App\Http\Requests\SignUp;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'emailAddress' => 'required',
            'username' => 'unique|required',
            'password' => 'required|password',
            'fName' => 'required|string',
            'lName' => 'required|string',
            'mName' => 'nullable|string',
            'bData' => 'required|date',
            'age' => 'required|Numeric',
            'civivStats' => 'string|nullable',
            'gender' => 'required|string',
            'contact' => 'required|string|max:11',
            'religion' => 'nullable|string',
            'email_address' => 'required|email'
        ];
    }
}
