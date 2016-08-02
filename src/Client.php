<?php
namespace DVLASearch\SDK;

class Client {
	const ENDPOINT = 'https://dvlasearch.appspot.com/%s?apikey=%s&licencePlate=%s';
	private $type = '';
	private $key = '';

	public function __construct(string $key, string $type) {
		$this->key = $key;
		$this->type = $type;
	}

	private function parse(string $plate): string {
		if(!$plate) {
			throw new Exception('Empty $plate given in DVLASearch\SDK::parseUrl');
		} else {
			return vsprintf($this::ENDPOINT, $this->type, $this->key, $plate);
		}
	}

	protected function query(string $plate) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->parse($plate));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$this->parse($plate);
	}
}