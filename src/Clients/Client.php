<?php
namespace DVLASearch\SDK\Clients;

use DVLASearch\SDK\Objects\Object;

class Client {
	const ENDPOINT = 'https://dvlasearch.appspot.com/%s?apikey=%s&licencePlate=%s';
	private $map = null;

	private $type = '';
	private $plate = '';
	private $key = 'DvlaSearchDemoAccount';

	public function __construct(string $key, string $type)
	{
		$arr = explode('\\', __NAMESPACE__);
    		$arr[count($arr) - 1] = 'Objects\\';
		$namespace =  implode('\\', $arr);
		
		$this->map = [
			'DvlaSearch' => $namespace . 'Vehicle'::class,
			'MotHistory' => $namespace . 'Mot'::class,
			'TyreSearch' => $namespace . 'Tyres'::class,
		];

		if($key) $this->key = $key;
		$this->type = $type;
	}
	
	private function toObject($data): Object
	{
		$name = $this->map[$this->type];
		return new $name($data, $this->key, $this->plate);
	}

	private function parse(): string
	{
		return sprintf($this::ENDPOINT, $this->type, $this->key, strtoupper(str_replace(' ', '', $this->plate)));
	}
	
	protected function query(string $plate): Object
	{
		if(!$plate) throw new Exception('Empty $plate given');
		$this->plate = $plate;

		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $this->parse()
		]);
		
		if(!$result = curl_exec($curl)) throw new \Exception('cURL error (' . curl_errno($curl) . '): ' . curl_error($curl));
		
		$result = json_decode($result);
		if(isset($result->error) && $result->error) throw new \Exception($result->message);
		
		return $this->toObject($result);
	}
}
