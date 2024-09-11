<?php

namespace App\Enums;

use App\Services\Providers\HotelLegs\HotelLegsAdapter;

class Provider
{
    public const PROVIDERS = [
        '1' => self::HOTEL_LEGS,
        '2' => self::TRAVEL_DOOR_X,
        '3' => self::SPEEDIA,
    ];

    public const PROVIDERS_CLASSES = [
        '1' => HotelLegsAdapter::class,
        '2' => HotelLegsAdapter::class,
        '3' => HotelLegsAdapter::class,
    ];

    public const HOTEL_LEGS = [
        'hotelId' => 1,
        'name' => 'Hotel Legs',
    ];

    public const TRAVEL_DOOR_X = [
        'hotelId' => 2,
        'name' => 'TravelDoorX',
    ];

    public const SPEEDIA = [
        'hotelId' => 3,
        'name' => 'Speedia',
    ];

    public static function getProviders()
    {
        return self::PROVIDERS;
    }
}
