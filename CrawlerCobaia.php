<?php
require 'CrawlerInterface.php';

class Cobaia extends Crawler implements CrawlerInterface {
	
	const URL = 'http://feeds.feedburner.com/cobaia/';
	
	public function __construct() {
		parent::__construct();
	}
	
	/**
	* Implements the getData method
	*/
	public function getData() {
		//request the url
		$this->request(self::URL);
		//filter by the tag item
		$news = pq('item');
		$result = array();
		//iterate by the results
		foreach ($news as $new) {
			//get the tag pubDate inside the DOM of new, and return the text
			$date = pq('pubDate', $new)->text();
			$date = date('Y-m-d', strtotime($date));

			$result[] = array('url' => pq('link', $new)->text(), //get the tag link inside the DOM of new, and return the text
							  'title' => pq('title', $new)->text(), //get the tag title inside the DOM of new, and return the text
							  'date' => $date);
		}

		return $result;
	}
	
	
}
?>
