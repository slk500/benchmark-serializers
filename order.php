<?php
/**
 * Created by PhpStorm.
 * User: slk500
 * Date: 22.05.17
 * Time: 21:58
 */
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

/**json_encode()1**/
$startTime = microtime(true);
json_encode($persons);
$jsonEncodeTime1 = (microtime(true) - $startTime);

/**json_encode()2**/
$startTime = microtime(true);
json_encode($persons);
$jsonEncodeTime2 = (microtime(true) - $startTime);

/**json_encode()3**/
$startTime = microtime(true);
json_encode($persons);
$jsonEncodeTime3 = (microtime(true) - $startTime);

/**json_encode()4**/
$startTime = microtime(true);
json_encode($persons);
$jsonEncodeTime4 = (microtime(true) - $startTime);

$result = [
    ['name' => 'json_encode()1', 'value' => $jsonEncodeTime1],
    ['name' => 'json_encode()2', 'value' => $jsonEncodeTime2],
    ['name' => 'json_encode()3', 'value' => $jsonEncodeTime3],
    ['name' => 'json_encode()4', 'value' => $jsonEncodeTime4],
];

array_multisort(array_column($result, 'value'), SORT_ASC, $result);

print_r($result);

echo ($result[0]['name']) . " is the fastest one" . PHP_EOL;
echo ($result[1]['name']) . " is " . $result[1]['value']/$result[0]['value'] . " slower then " . $result[0]['name']. PHP_EOL;
echo ($result[2]['name']) . " is " . $result[2]['value']/$result[0]['value'] . " slower then " . $result[0]['name']. PHP_EOL;
echo ($result[3]['name']) . " is " . $result[3]['value']/$result[0]['value'] . " slower then " . $result[0]['name']. PHP_EOL;