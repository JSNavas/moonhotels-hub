<?php

namespace App\Http\Responses;

class HubResponse
{
    public $rooms;

    public function __construct($rooms = [])
    {
        $this->rooms = $rooms;
    }
}
