<?php
namespace DVLASearch\SDK\Objects;

use DVLASearch\SDK\Mot as MotClient;
use DVLASearch\SDK\Vehicle as VehicleClient;

class Tyres implements Object {
	private $key = '';
	private $plate = '';

	public function __construct($data, string $key, string $plate) {
		$this->key = $key;
		$this->plate = $plate;
		
		foreach($data as $key => $value) {
			$this->{$key} = $value;
		}
	}

	public function mot(): Mot {
		$client = new MotClient($this->key);
		return $client->get($this->plate);
	}
	
	public function vehicle(): Vehicle {
		$client = new VehicleClient($this->key);
		return $client->get($this->plate);
	}
}