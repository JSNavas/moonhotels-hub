<?php

namespace App\Services\Providers\Speedia;

use App\Http\Responses\ProviderResponse;

class SpeediaResponse extends ProviderResponse
{
    public array $results;

    public function __construct(array $results)
    {
        $this->results = $results;
    }
}
