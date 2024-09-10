<?php

namespace App\Providers\HotelLegs;

use App\Http\Responses\ProviderResponse;

class HotelLegsResponse extends ProviderResponse
{
    public array $results;

    public function __construct(array $results)
    {
        $this->results = $results;
    }
}
