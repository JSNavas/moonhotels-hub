<?php

namespace Tests\Feature;

use Tests\TestCase;

class HubControllerTest extends TestCase
{
    public function test_search()
    {
        $response = $this->postJson('/api/search', [
            'hotelId' => 1,
            'checkIn' => '2023-10-20',
            'checkOut' => '2023-10-25',
            'numberOfGuests' => 3,
            'numberOfRooms' => 2,
            'currency' => 'EUR'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['rooms' => [['roomId', 'rates']]]);
    }
}
