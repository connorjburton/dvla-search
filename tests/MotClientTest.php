<?php
use PHPUnit\Framework\TestCase;

use DVLASearch\SDK\Clients\Mot;

class MotClientTest extends TestCase
{
    public function testReturnsDummyData()
    {
        $client = new Mot();
        $result = $client->get('mt09nks');
        $this->assertFalse(isset($result->error));
    }

    public function testVehicleRelationship()
    {
        $client = new Mot();
        $result = $client->get('mt09nks');
        $this->assertFalse(isset($result->vehicle()->error));
    }

    public function testTyreRelationship()
    {
        $client = new Mot();
        $result = $client->get('mt09nks');
        $this->assertFalse(isset($result->tyres()->error));
    }
}