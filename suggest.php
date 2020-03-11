<?php
 	header("Access-Control-Allow-Origin: *");
	require 'vendor/autoload.php';
	use Elasticsearch\ClientBuilder;
	$client = ClientBuilder::create()->build();
	$params = [
    	'index' => 'funder',
    	'body'  => [
        	'query' => [
            	'match' => [
                	'name' => [
                		'query'=>$_GET['search'],
                		'fuzziness' => '1',
                		'operator' => 'and',
                		'minimum_should_match'=> '90%'
                	]
            	]
        	],
        	"highlight" => [
        		"fields" => [
            		"name" => new stdClass()
            	]
        	],
        	"from" => 0, 
        	"size" => 5,
    	]
	];
	$results = $client->search($params);
	print_r(json_encode($results['hits']['hits']));
?>