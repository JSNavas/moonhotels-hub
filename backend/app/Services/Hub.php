<?php

namespace App\Services;

use App\Http\Requests\SearchRequest;
use App\Http\Responses\HubResponse;
use App\Services\Providers\HotelLegs\HotelLegsAdapter;
use App\Services\Providers\Speedia\SpeediaAdapter;

class Hub
{
    private array $providers = [
        HotelLegsAdapter::class,
        SpeediaAdapter::class,
    ];

    public function search(SearchRequest $request): HubResponse
    {
        $responses = collect([]);
        foreach ($this->providers as $providerClass) {
            $provider = app($providerClass);
            $providerRequest = $provider->translateRequest($request);
            $providerResponse = $provider->search($providerRequest);
            $responses->push($provider->translateResponse($providerResponse));
        }

        // Aplanar las respuestas para eliminar el primer key 'rooms'
        $flattenedResponses = $responses->flatMap(function ($response) {
            return $response->rooms;
        });

        return new HubResponse($flattenedResponses);
    }
}
