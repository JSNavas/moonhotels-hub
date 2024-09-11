<?php

namespace App\Enums;

use App\Services\Providers\HotelLegs\HotelLegsAdapter;
use App\Services\Providers\Speedia\SpeediaAdapter;

class Provider
{
    public const PROVIDERS = [
        '1' => self::HOTEL_LEGS,
        '2' => self::SPEEDIA,
    ];

    public const PROVIDERS_CLASSES = [
        '1' => HotelLegsAdapter::class,
        '2' => SpeediaAdapter::class,
    ];

    public const HOTEL_LEGS = [
        'hotelId' => 1,
        'name' => 'Hotel Legs',
    ];

    public const SPEEDIA = [
        'hotelId' => 2,
        'name' => 'Speedia',
    ];

    public static function getProviders()
    {
        return self::PROVIDERS;
    }
}
