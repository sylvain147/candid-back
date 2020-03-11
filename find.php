<?php
 	header("Access-Control-Allow-Origin: *");
	require 'vendor/autoload.php';
	use Elasticsearch\ClientBuilder;
	$client = ClientBuilder::create()->build();
	$params = [
    	'index' => 'funder',
    	'body'  => [
        	'query' => [
            	'term' => [
                	'name' => $_GET['search']
            	]
        	]
    	]
	];
$results = $client->search($params);
print_r(json_encode($results['hits']['hits']));
?>