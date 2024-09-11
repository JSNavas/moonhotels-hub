<?php

namespace App\Http\Responses;

class ProviderResponse
{
    public array $results;

    public function __construct(array $results)
    {
        $this->results = $results;
    }
}
