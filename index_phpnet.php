<?php
	require 'CrawlerFactory.php';
	$crawler = CrawlerFactory::factory('Phpnet');
	$result = $crawler->getData();
	var_dump($result);
?>
