<?php
namespace DVLASearch\SDK;

class VehicleClient extends Client {
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