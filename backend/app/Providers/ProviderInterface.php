<?php

namespace App\Providers;

use App\Http\Requests\SearchRequest;
use App\Http\Responses\HubResponse;
use App\Http\Responses\ProviderResponse;
use App\Http\Requests\ProviderRequest;

interface ProviderInterface
{
    public function translateRequest(SearchRequest $request): ProviderRequest;
    public function search(ProviderRequest $request): ProviderResponse;
    public function translateResponse(ProviderResponse $response): HubResponse;
}
