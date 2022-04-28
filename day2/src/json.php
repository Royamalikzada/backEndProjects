<?php

$jsonString = json_encode([
    [
        "id" => 1,
        "username" => "andrew",
        "email" => "some@some.com"
    ]
]);

$decoded = json_decode($jsonString);
var_dump($jsonString, $decoded[0]->id);


