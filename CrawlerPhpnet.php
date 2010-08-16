<?php
require 'CrawlerInterface.php';

class Phpnet extends Crawler implements CrawlerInterface {
	
	const URL = 'http://php.net';
	
	public function __construct() {
		parent::__construct();
	}
	
	/**
	* Implements the getData method
	*/
	public function getData() {
		//request the url
		$this->request(self::URL);
		$title = pq('h1.summary:first');
		return pq('a', $title)->text();
	}
	
	
}
?>
