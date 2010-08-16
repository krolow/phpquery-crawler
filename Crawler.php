<?php

require 'phpQuery.php';

class Crawler {

	public $content;
	
	public function __construct() {
	}

	protected function request($url, $contentType = 'utf-8') {
		$this->content = $this->get_content($url);
		phpQuery::newDocument($this->content);
		return $this->content;
	}
	
	private function get_content($url) {
		$ch = curl_init();
		$timeout = 5; 
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);

		return $file_contents;
	}
	
}
?>
