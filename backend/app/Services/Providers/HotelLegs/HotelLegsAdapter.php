<?php

namespace App\Services\Providers\HotelLegs;

use App\Interfaces\ProviderInterface;
use App\Http\Requests\SearchRequest;
use App\Services\Providers\HotelLegs\HotelLegsRequest;
use App\Services\Providers\HotelLegs\HotelLegsResponse;
use App\Http\Requests\ProviderRequest;
use App\Http\Responses\HubResponse;
use App\Http\Responses\ProviderResponse;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class HotelLegsAdapter implements ProviderInterface
{
    public function translateRequest(SearchRequest $request): HotelLegsRequest
    {
        // Lógica para transformar la solicitud del HUB al formato de HotelLegs
        return new HotelLegsRequest(query: [
            'hotel' => $request->hotelId,
            'checkIn' => $request->checkIn,
            'checkOut' => $request->checkOut,
            'numberOfGuests' => $request->numberOfGuests,
            'numberOfRooms' => $request->numberOfRooms,
            'currency' => $request->currency,
        ]);
    }

    public function search(ProviderRequest $request): HotelLegsResponse
    {
        // Realizar la petición a la API de HotelLegs y devolver la respuesta
        // $client = new Client();
        // $response = $client->request('GET', 'https://api.hotellegs.com/search', [
        //     'query' => $request->toArray(),
        // ]);

        $data = $this->getData()
                        ->when(
                            !is_null($request->hotel),
                            fn($q) => $q->where('hotel', '=', $request->hotel)
                        )
                        ->when(
                            !is_null($request->checkIn),
                            fn($q) => $q->where('date', '>=', $request->checkIn)
                        )
                        ->when(
                            !is_null($request->checkOut),
                            fn($q) => $q->where('date', '<=', $request->checkOut),
                        )
                        ->when(
                            !is_null($request->numberOfGuests),
                            fn($q) => $q->where('numPerson'. '>=', $request->numberOfGuests)
                        )
                        ->when(
                            !is_null($request->numberOfRooms),
                            fn($q) => $q->where('room', '=', $request->numberOfRooms)
                        )
                        ->when(
                            !is_null($request->currency),
                            fn($q) => $q->where('currency', '=', $request->currency)
                        );

        return new HotelLegsResponse($data->toArray());
    }

    public function translateResponse($response): HubResponse
    {
        // Lógica para transformar la respuesta de HotelLegs al formato del HUB
        $results = collect($response->results);
        $hubResponse = new HubResponse();

        $hubResponse->rooms = $results->map(function ($result) {
            return [
                'roomId' => $result['room'],
                'rates' => [
                    [
                        'mealPlanId' => $result['meal'],
                        'isCancellable' => $result['canCancel'],
                        'price' => $result['price'],
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
                'hotel'         => 1,
                'room'          => 1,
                'meal'          => 1,
                'canCancel'     => false,
                'price'         => 123.48,
                'numPerson'     => 2,
                'date'          => Carbon::createFromFormat('Y-m-d', '2024-09-05'),
                'currency'      => 'EUR'
            ],
            [
                'hotel'         => 1,
                'room'          => 2,
                'meal'          => 1,
                'canCancel'     => true,
                'price'         => 150.00,
                'numPerson'     => 4,
                'date'          => Carbon::createFromFormat('Y-m-d', '2024-09-10'),
                'currency'      => 'EUR'
            ],
            [
                'hotel'         => 3,
                'room'          => 3,
                'meal'          => 1,
                'canCancel'     => false,
                'price'         => 148.25,
                'numPerson'     => 5,
                'date'          => Carbon::createFromFormat('Y-m-d', '2024-09-15'),
                'currency'      => 'EUR'
            ]
        ]);
    }
}
