<?php
use PHPUnit\Framework\TestCase;

use DVLASearch\SDK\Clients\Tyres;

class MotClientTest extends TestCase
{
    public function testReturnsDummyData()
    {
        $client = new Tyres();
        $result = $client->get('mt09nks');
        $this->assertFalse(isset($result->error));
    }

    public function testVehicleRelationship()
    {
        $client = new Tyres();
        $result = $client->get('mt09nks');
        $this->assertFalse(isset($result->vehicle()->error));
    }
    
    public function testMotRelationship()
    {
        $client = new Tyres();
        $result = $client->get('mt09nks');
        $this->assertFalse(isset($result->mot()->error));
    }
}