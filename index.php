<?php

require_once 'vendor/autoload.php';
require_once 'Entity/Person.php';
require_once 'Entity/Book.php';
require_once 'functions.php';

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

$serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
$jms = JMS\Serializer\SerializerBuilder::create()->build();
$persons = unserialize(file_get_contents('10.txt'));

$result = [];

/**json_encode()**/
$startTime = microtime(true);
json_encode($persons);
$jsonEncodeTime = (microtime(true) - $startTime);

/**serialize()**/
$startTime = microtime(true);
serialize($persons);
$phpSerializerTime = (microtime(true) - $startTime);

/**Symfony Serializer**/
$startTime = microtime(true);
$serializer->serialize($persons, 'json');
$symfonyTime = (microtime(true) - $startTime);

/**JMS Serializer**/
$startTime = microtime(true);
$jms->serialize($persons, 'json');
$jmsTime = (microtime(true) - $startTime);

$result = [
    ['name' => 'serialize()', 'value' => $phpSerializerTime ],
    ['name' => 'json_encode()', 'value' => $jsonEncodeTime],
    ['name' => 'Symfony Serializer', 'value' => $symfonyTime],
    ['name' => 'JMS Serializer', 'value' => $jmsTime]
];

array_multisort(array_column($result, 'value'), SORT_ASC, $result);

print_r($result);



echo ($result[0]['name']) . " is the fastest one" . PHP_EOL;
echo ($result[1]['name']) . " is " . $result[1]['value']/$result[0]['value'] . " slower then " . $result[0]['name']. PHP_EOL;
echo ($result[2]['name']) . " is " . $result[2]['value']/$result[0]['value'] . " slower then " . $result[0]['name']. PHP_EOL;
echo ($result[3]['name']) . " is " . $result[3]['value']/$result[0]['value'] . " slower then " . $result[0]['name']. PHP_EOL;





