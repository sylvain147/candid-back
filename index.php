<?php
	require 'vendor/autoload.php';
	use Elasticsearch\ClientBuilder;
	$client = ClientBuilder::create()->build();
	$url = getenv('APILINK').'?apiKey='.getenv('APIKEY');
	$curl = curl_init();
	curl_setopt_array($curl, [
    	CURLOPT_RETURNTRANSFER => 1,
    	CURLOPT_URL => $url,
	]);
	$resp = curl_exec($curl);
	$datas = json_decode($resp)->data->results->rows;
	foreach ($datas as $data) {
		$params = [
	    	'index' => 'funder',
	    	'id'    => $data->key,
	    	'body'  => [
	    		'name' => $data->name,
	    		'url' => $data->url, 
	    		'amount'=> $data->amount
	    	]
		];
		$client->index($params);
	}
	curl_close($curl);
?>
