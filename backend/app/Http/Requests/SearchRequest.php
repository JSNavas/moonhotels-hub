<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // Assuming all users are authorized
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'hotelId' => 'integer',
            'checkIn' => 'date',
            'checkOut' => 'date',
            'numberOfGuests' => 'integer',
            'numberOfRooms' => 'integer',
            'currency' => 'string',
        ];
    }

    /**
     * Customize error messages for validation.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'hotelId.exists' => 'The selected hotel is not valid.',
            'checkIn.after' => 'The check-in date must be in the future.',
            'checkOut.after' => 'The check-out date must be after the check-in date.',
            'numberOfGuests.min' => 'At least one guest is required.',
            'numberOfRooms.min' => 'At least one room is required.',
        ];
    }
}
