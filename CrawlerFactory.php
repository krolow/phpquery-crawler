<?php
require 'Crawler.php';

abstract class CrawlerFactory {
	
	private $className;
	private $args;
	
	public static function factory($className, $args = array()) {
		if (is_file(dirname(__FILE__) . '/Crawler' . $className . '.php')) {
			require_once 'Crawler' . $className . '.php';
			
			$class = new $className(implode(',', $args));
			
			return $class;
		} else {
			throw new Exception('Is not a valid class');
		}
	}
}
?>
