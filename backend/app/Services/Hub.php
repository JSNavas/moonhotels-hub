<?php

namespace App\Services;

use App\Http\Requests\SearchRequest;
use App\Http\Responses\HubResponse;
use App\Enums\Provider;

class Hub
{
    public function search(SearchRequest $request): HubResponse
    {
        $responses = collect([]);
        $providersClasses = Provider::PROVIDERS_CLASSES;

        foreach ($providersClasses as $providerClass) {
            $provider = app($providerClass);
            $providerRequest = $provider->translateRequest($request);
            $providerResponse = $provider->search($providerRequest);
            $responses[] = $provider->translateResponse($providerResponse);
        }

        // Aplanar las respuestas para eliminar el primer key 'rooms'
        $flattenedResponses = collect($responses)->flatMap(function ($response) {
            return $response->rooms;
        });

        return new HubResponse($flattenedResponses);
    }
}
