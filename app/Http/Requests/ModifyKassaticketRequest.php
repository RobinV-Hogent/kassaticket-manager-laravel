<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ModifyKassaticketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'klant.*' => 'required|max:100',
            'email.*' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'klant.*.required' => 'Vul alsjeblieft een naam in',
            'klant.*.max' => 'Vul een kortere naam in (max 100 tekens)',
            'email.*.required' => 'Vul alsjeblieft een emailadres in',
            'email.*.email' => 'Vul alsjeblieft een gelding emailadres in',
        ];
    }
}
