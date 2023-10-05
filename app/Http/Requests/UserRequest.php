<?php

namespace App\Http\Requests;

use App\Rules\NoNumber;
use App\Rules\NoSymbol;
use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => ['required','min:5','max:200', new Uppercase, new NoSymbol,New NoNumber],
                    'email' => 'required|email|unique:users,email',
                ];
            case 'PUT':
                return [
                    'name' => ['required','min:5','max:200', new Uppercase, new NoSymbol,New NoNumber],
                    'email' => "required|email|unique:users,email,{$this->id}",
                ];
            default:
                return [];
        }
    }

    public function withValidator()
    {
        \Log::info('Req=App/Http/Request/UserRequest@withValidator Called');
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please provide your full name.',
            'email.required' => 'Please provide a valid email address.',
        ];
    }
}