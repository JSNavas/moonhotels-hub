<?php

namespace App\Services;

use App\Http\Requests\SearchRequest;
use App\Http\Responses\HubResponse;
use App\Enums\Provider;

class Hub
{
    public function search(SearchRequest $request): HubResponse
    {
        if($request->hotelId) {
            $responses = [];
            $providerClass = Provider::PROVIDERS_CLASSES[$request->hotelId];

            $provider = app($providerClass);

            $providerRequest = $provider->translateRequest($request);
            $providerResponse = $provider->search($providerRequest);
            $responses = $provider->translateResponse($providerResponse);

            return new HubResponse(collect($responses)->flatten(1));

        } else {
            $responses = [];
            $providersClasses = Provider::PROVIDERS_CLASSES;

            foreach ($providersClasses as $providerClass) {
                $provider = app($providerClass);
                $providerRequest = $provider->translateRequest($request);
                $providerResponse = $provider->search($providerRequest);
                $responses = $provider->translateResponse($providerResponse);
            }

            return new HubResponse(collect($responses)->flatten(1));
        }
    }
}
