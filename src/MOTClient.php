<?php
namespace DVLASearch\SDK;

class MotClient extends Client {
	const TYPE = 'MotHistory';

	public function __construct(string $key = '')
	{
		parent::__construct($key, $this::TYPE);
	}

	public function get(string $plate)
	{
		return $this->query($plate);
	}
}