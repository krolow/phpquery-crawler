<?php
	require 'CrawlerFactory.php';

	$crawler = CrawlerFactory::factory('Cobaia');
	$result = $crawler->getData();
	var_dump($result);
?>
