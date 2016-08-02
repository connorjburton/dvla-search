<?php
namespace DVLASearch\SDK;

class TyresClient extends Client {
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