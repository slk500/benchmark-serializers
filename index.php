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
$persons = unserialize(file_get_contents('100.txt'));

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
    'serialize()' => $phpSerializerTime,
    'json_encode()' => $jsonEncodeTime,
    'Symfony Serializer' => $symfonyTime,
    'JMS Serializer' => $jmsTime,
];

asort($result);

print_r($result);

foreach ($result as $key => $value)
{
    echo $key . 'is the fastest one';
}



//echo "Symfony is " . ($symfonyTime / $jsonTime) . " slower then json encode" . PHP_EOL;
//echo "JMS is " . ($jmsTime / $jsonTime) . " slower then json encode" . PHP_EOL;




