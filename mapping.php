<?php
require 'vendor/autoload.php';
use Elasticsearch\ClientBuilder;
$client = ClientBuilder::create()->build();
$deleteParams['index'] = 'funder';
$client->indices()->delete($deleteParams);
$params = [
    'index' => 'funder',
    'body' => [
        "settings"=> [
            "analysis"=> [
                "analyzer"=> [
                    "my_analyzer"=> [
                        "tokenizer"=> "my_tokenizer"
                    ]
                ],
                "tokenizer"=>[
                    "my_tokenizer"=>[
                        "type"=> "edge_ngram",
                        "min_gram"=> 2,
                        "max_gram"=> 10,
                        "token_chars"=> [
                            "letter",
                            "digit"
                        ]
                    ]
                ]
            ]
        ],
        'mappings' => [
            '_source' => [
                'enabled' => true
            ],
            'properties' => [
                'name' => [
                    'type' => 'text',
                    'analyzer' => 'my_analyzer'
                ],
                'age' => [
                    'type' => 'integer'
                ]
            ]
        ]
    ]
];
$response = $client->indices()->create($params);
?>