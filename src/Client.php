<?php
namespace DVLASearch\SDK;

class Client {
	const ENDPOINT = 'https://dvlasearch.appspot.com/%s?apikey=%s&licencePlate=%s';

	private $type = '';
	private $key = 'DvlaSearchDemoAccount';

	public function __construct(string $key, string $type)
	{
		if($key) $this->key = $key;
		$this->type = $type;
	}

	private function parse(string $plate): string
	{
		if(!$plate) throw new Exception('Empty $plate given');
		
		return sprintf($this::ENDPOINT, $this->type, $this->key, $plate);
	}

	protected function query(string $plate)
	{
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $this->parse($plate)
		]);

		if(!$result = curl_exec($curl)) throw new Exception('cURL error (' . curl_errno($curl) . '): ' . curl_error($curl));
		
		return json_decode($result);
	}
}