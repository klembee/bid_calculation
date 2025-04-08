<?php

namespace Tests\Feature;

class CalculateEndpointTest extends BaseTestCase
{
    public function testValidCalculation()
    {
        $response = $this->request('POST', '/get_vehicle_total_price', [
            'price' => 1000,
            'type' => 'common',
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $body = (string) $response->getBody();
        $data = json_decode($body, true);

        $this->assertArrayHasKey('total', $data);
        $this->assertEquals(1180, $data['total']);
    }

    public function testInvalidPrice()
    {
        $response = $this->request('POST', '/get_vehicle_total_price', [
            'price' => -10,
            'type' => 'common',
        ]);

        $this->assertEquals(422, $response->getStatusCode());

        $data = json_decode((string) $response->getBody(), true);

        $this->assertContains('`price` is not valid.', $data);
    }
}