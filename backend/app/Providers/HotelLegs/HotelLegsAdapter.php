<?php

namespace App\Providers\HotelLegs;

use App\Providers\ProviderInterface;
use App\Http\Requests\SearchRequest;
use App\Providers\HotelLegs\HotelLegsRequest;
use App\Providers\HotelLegs\HotelLegsResponse;
use App\Http\Requests\ProviderRequest;
use App\Http\Responses\HubResponse;
use App\Http\Responses\ProviderResponse;
use GuzzleHttp\Client;

class HotelLegsAdapter implements ProviderInterface
{
    public function translateRequest(SearchRequest $request): HotelLegsRequest
    {
        // Lógica para transformar la solicitud del HUB al formato de HotelLegs
        return new HotelLegsRequest([
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

        $results = array(
            [
                'room' => 1,
                'meal' => 1,
                'canCancel' => false,
                'price' => 123.48
            ],
            [
                'room' => 1,
                'meal' => 1,
                'canCancel' => true,
                'price' => 150.00
            ],
            [
                'room' => 2,
                'meal' => 1,
                'canCancel' => false,
                'price' => 148.25
            ]
        );

        return new HotelLegsResponse($results);
    }

    public function translateResponse(ProviderResponse $response): HubResponse
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
}
