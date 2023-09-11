<?php

namespace App\Http\Requests;

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
            case 'POST': {
                    return [
                        'name' => 'required',
                        'email' => 'required|email'
                    ];
                }
            case 'PUT': {
                    return [
                        'name' => 'required',
                        'email' => 'required|unique:users,email,' . $this->user . ',id|min:12|max:255',

                    ];
                }
            default:
                break;
        }

    }


    public function withValidator()
    {

        \Log::info('Req=App/Http/Request/UserRequest@withValidator Called');
    }
}