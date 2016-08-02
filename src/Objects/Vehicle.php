<?php
namespace DVLASearch\SDK\Objects;

use DVLASearch\SDK\MotClient;
use DVLASearch\SDK\TyresClient;

class Vehicle {
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

	public function tyres(): Tyres {
		$client = new TyresClient($this->key);
		return $client->get($this->plate);
	}
}