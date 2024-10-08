<?php

namespace App\Services\Providers\Speedia;

use App\Http\Requests\ProviderRequest;

class SpeediaRequest extends ProviderRequest
{
    /**
     * Define las reglas de validación para la solicitud.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id_hotel' => 'integer',
            'check_in' => 'date',
            'numberOfNights' => 'integer',
            'guests' => 'integer',
            'number_rooms' => 'integer',
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
