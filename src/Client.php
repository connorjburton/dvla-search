<?php
namespace DVLASearch\SDK;

class Client {
	const ENDPOINT = 'https://dvlasearch.appspot.com/%s?apikey=%s&licencePlate=%s';
	const OBJECT_MAP = [
		'DvlaSearch' => __NAMESPACE__ . '\Objects\Vehicle',
		'MotHistory' => __NAMESPACE__ . '\Objects\MOT',
		'TyreSearch' => __NAMESPACE__ . '\Objects\Tyres'
	];
	
	private $type = '';
	private $plate = '';
	private $key = 'DvlaSearchDemoAccount';

	public function __construct(string $key, string $type)
	{
		if($key) $this->key = $key;
		$this->type = $type;
	}
	
	private function toObject($data)
	{
		$name = $this::OBJECT_MAP[$this->type];
		return new $name($data, $this->key, $this->plate);
	}

	private function parse(): string
	{
		return sprintf($this::ENDPOINT, $this->type, $this->key, $this->plate);
	}
	
	protected function query(string $plate)
	{
		if(!$plate) throw new Exception('Empty $plate given');
		$this->plate = $plate;

		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $this->parse()
		]);
		
		if(!$result = curl_exec($curl)) throw new Exception('cURL error (' . curl_errno($curl) . '): ' . curl_error($curl));

		return $this->toObject(json_decode($result));
	}
}