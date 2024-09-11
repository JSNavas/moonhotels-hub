<?php

namespace App\Services\Providers\Speedia;

use App\Interfaces\ProviderInterface;
use App\Http\Requests\SearchRequest;
use App\Services\Providers\HotelLegs\HotelLegsRequest;
use App\Services\Providers\Speedia\SpeediaRequest;
use App\Services\Providers\Speedia\SpeediaResponse;
use App\Http\Requests\ProviderRequest;
use App\Http\Responses\HubResponse;
use App\Http\Responses\ProviderResponse;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class SpeediaAdapter implements ProviderInterface
{
    public function translateRequest(SearchRequest $request): SpeediaRequest
    {
        $checkInDate = Carbon::parse($request->checkIn);
        $checkOutDate = Carbon::parse($request->checkOut);

        return new SpeediaRequest(query: [
            'id_hotel' => $request->hotelId,
            'check_in' => $request->checkIn,
            'number_nights' => $checkOutDate->diffInDays($checkInDate),
            'number_guests' => $request->numberOfGuests,
            'number_rooms' => $request->numberOfRooms,
            'currency' => $request->currency,
        ]);
    }

    public function search(ProviderRequest $request): SpeediaResponse
    {
        // Realizar la petición a la API de HotelLegs y devolver la respuesta
        // $client = new Client();
        // $response = $client->request('GET', 'https://api.hotellegs.com/search', [
        //     'query' => $request->toArray(),
        // ]);

        $data = $this->getData()
                        ->when(
                            !is_null($request->id_hotel),
                            fn($q) => $q->where('id_hotel', '=', $request->id_hotel)
                        )
                        ->when(
                            !is_null($request->check_in),
                            fn($q) => $q->where('date', '>=', $request->check_in)
                        )
                        ->when(
                            !is_null($request->number_guests),
                            fn($q) => $q->where('num_person', '>=', $request->number_guests)
                        )
                        ->when(
                            !is_null($request->number_rooms),
                            fn($q) => $q->where('num_rooms', '>=', $request->number_rooms)
                        )
                        ->when(
                            !is_null($request->currency),
                            fn($q) => $q->where('currency', '=', $request->currency)
                        );

        return new SpeediaResponse($data->toArray());
    }

    public function translateResponse($response): HubResponse
    {
        // Lógica para transformar la respuesta de HotelLegs al formato del HUB
        $results = collect($response->results);
        $hubResponse = new HubResponse();

        $hubResponse->rooms = $results->map(function ($result) {
            return [
                'roomId' => $result['id_room'],
                'rates' => [
                    [
                        'mealPlanId' => $result['num_meal'],
                        'isCancellable' => $result['can_cancel'],
                        'price' => $result['cost'],
                    ],
                ],
            ];
        });
        return $hubResponse;
    }

    private function getData(): Collection
    {
        return collect([
            [
                'id_hotel'          => 2,
                'id_room'           => 1,
                'num_rooms'         => 4,
                'num_meal'          => 1,
                'can_cancel'        => false,
                'cost'              => 135.48,
                'numPerson'         => 2,
                'date'              => Carbon::createFromFormat('Y-m-d', '2024-09-05'),
                'currency'          => 'EUR'
            ],
            [
                'id_hotel'          => 2,
                'id_room'           => 2,
                'num_rooms'         => 5,
                'num_meal'          => 1,
                'can_cancel'        => true,
                'cost'              => 145.00,
                'numPerson'         => 4,
                'date'              => Carbon::createFromFormat('Y-m-d', '2024-09-10'),
                'currency'          => 'EUR'
            ],
            [
                'id_hotel'          => 2,
                'id_room'           => 3,
                'num_rooms'         => 1,
                'num_meal'          => 1,
                'can_cancel'        => false,
                'cost'              => 155.25,
                'numPerson'         => 5,
                'date'              => Carbon::createFromFormat('Y-m-d', '2024-09-15'),
                'currency'          => 'EUR'
            ]
        ]);
    }
}
