<?php
namespace DVLASearch\SDK\Clients;

class Tyres extends Client {
	const TYPE = 'TyreSearch';
	
	public function __construct(string $key = '')
	{
		parent::__construct($key, $this::TYPE);
	}
	
	public function get(string $plate)
	{
		return $this->query($plate);
	}
}