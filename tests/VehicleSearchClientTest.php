<?php
use PHPUnit\Framework\TestCase;

use DVLASearch\SDK\VehicleSearchClient;

class VehicleSearchClientTest extends TestCase
{
    public function testReturnsDummyData()
    {
        $client = new VehicleSearchClient();
        $result = $client->get('mt09nks');
        $this->assertFalse(isset($result->error));
    }
}