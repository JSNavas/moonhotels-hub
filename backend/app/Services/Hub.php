<?php

namespace App\Services;

use App\Http\Requests\SearchRequest;
use App\Http\Responses\HubResponse;
use App\Providers\HotelLegs\HotelLegsAdapter;

class Hub
{
    private array $providers = [
        HotelLegsAdapter::class,
        // Otros adaptadores
    ];

    public function search(SearchRequest $request): HubResponse
    {
        $responses = [];
        foreach ($this->providers as $providerClass) {

            $provider = app($providerClass);
            $providerRequest = $provider->translateRequest($request);
            $providerResponse = $provider->search($providerRequest);
            $responses = $provider->translateResponse($providerResponse);
        }

        return new HubResponse(collect($responses)->flatten(1));
    }
}
