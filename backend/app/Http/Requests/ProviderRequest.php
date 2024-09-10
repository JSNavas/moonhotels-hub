<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
{
    /**
     * Define las reglas de validación para la solicitud.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'hotel' => 'integer',
            'checkInDate' => 'date',
            'numberOfNights' => 'integer',
            'guests' => 'integer',
            'rooms' => 'integer',
            'currency' => 'string',

        ];
    }

    /**
     * Personaliza los mensajes de error.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            // Mensajes de error personalizados
        ];
    }
}
