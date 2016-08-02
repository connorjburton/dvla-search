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
		if(!$plate) {
			throw new Exception('Empty $plate given');
		} else {
			return sprintf($this::ENDPOINT, $this->type, $this->key, $plate);
		}
	}

	protected function query(string $plate)
	{
		$ch = curl_init();
		curl_setopt_array($ch, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $this->parse($plate)
		]);

		if($result = curl_exec($ch)) {
			return json_decode($result);
		} else {
			throw new Exception('cURL error (' . curl_errno($ch) . '): ' . curl_error($ch));
		}
	}
}