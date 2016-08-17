<?php
namespace DVLASearch\SDK\Clients;

class Vehicle extends Client {
	const TYPE = 'DvlaSearch';
	
	public function __construct(string $key = '')
	{
		parent::__construct($key, $this::TYPE);
	}
	
	public function get(string $plate)
	{
		return $this->query($plate);
	}
}