<?php
use PHPUnit\Framework\TestCase;

use DVLASearch\SDK\VehicleClient;

class VehicleClientTest extends TestCase
{
    public function testReturnsDummyData()
    {
        $client = new VehicleClient();
        $result = $client->get('mt09nks');
        $this->assertFalse(isset($result->error));
    }

    public function testMotRelationship()
    {
        $client = new VehicleClient();
        $result = $client->get('mt09nks');
        $this->assertFalse(isset($result->mot()->error));
    }

    public function testTyreRelationship()
    {
        $client = new VehicleClient();
        $result = $client->get('mt09nks');
        $this->assertFalse(isset($result->tyres()->error));
    }
}