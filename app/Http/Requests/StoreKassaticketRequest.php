<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreKassaticketRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'klant' => 'required|max:100',
            'email' => 'required|email',
            'ticket_path' => 'required|file|mimes:png,jpeg,jpg,pdf|max:4096'
        ];
    }

    public function messages()
    {
        return [
            'klant.required' => 'Vul alsjeblieft een naam in',
            'klant.max' => 'Vul een kortere naam in (max 100 tekens)',
            'email.required' => 'Vul alsjeblieft een emailadres in',
            'email.email' => 'Vul alsjeblieft een gelding emailadres in',
            'ticket_path.required' => 'Je kan geen kassaticket opladen zonder een bewijs toe te voegen',
            'ticket_path.mimes' => 'Je mag alleen maar bestanden van het type: png, jpeg, jpg en pdf opladen',
            'ticket_path.max' => 'Uw bestand is te groot (max 4MB)'
        ];
    }
}
