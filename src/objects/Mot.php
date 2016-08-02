<?php
namespace DVLASearch\SDK\Objects;

use DVLASearch\SDK\TyresClient;
use DVLASearch\SDK\VehicleClient;

class Mot {
	private $key = '';
	private $plate = '';

	public function __construct($data, string $key, string $plate) {
		$this->$key = $key;
		$this->$plate = $plate;
		
		foreach($data as $key => $value) {
			$this->{$key} = $value;
		}
	}

	public function tyres(): Tyres {
		$client = new TyresClient($this->key);
		return $client->get($this->plate);
	}

	public function vehicle(): Vehicle {
		$client = new VehicleClient($this->key);
		return $client->get($this->plate);
	}
}