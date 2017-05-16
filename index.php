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



$persons = makePersons(1);

$json = json_encode($persons);

echo $json;

$objects = json_decode($json, true);

print_r($objects);



$objects = personsFromArray($objects);

print_r($objects);

//file_put_contents('boo.txt', json_encode($persons), FILE_APPEND);
//
//print_r(json_decode(file_get_contents('boo.txt')));





///**JSON ENCODE ARRAYS**/
//$startTime = microtime(true);
//foreach($persons as $person)
//{
//   // echo json_encode($person->serialize());
//    json_encode($person->serialize());
//}
//$serializeTime = (microtime(true) - $startTime);
//echo "Elapsed time is: " . $serializeTime . " seconds". PHP_EOL;
//
///**JSON ENCODE OBJECTS**/
//$startTime = microtime(true);
//
//echo json_encode($persons) . PHP_EOL;
////json_encode($persons) . PHP_EOL;
//
//$jsonTime = (microtime(true) - $startTime);
//
//echo "Elapsed time is: " . $jsonTime . " seconds". PHP_EOL;


///**SYMFONY SERIALIZER**/
//$startTime = microtime(true);
//
////echo $serializer->serialize($persons, 'json') . PHP_EOL;
//$serializer->serialize($persons, 'json') . PHP_EOL;;
//
//$symfonyTime = (microtime(true) - $startTime);
//
//
//echo "Elapsed time is: " . $symfonyTime . " seconds" . PHP_EOL;
//
///**JMS SERIALIZER**/
//
//$startTime = microtime(true);
//
////echo $jms->serialize($persons, 'json') . PHP_EOL; //snake
//$jms->serialize($persons, 'json') . PHP_EOL; //snake
//
//$jmsTime = (microtime(true) - $startTime);
//echo "Elapsed time is: " . $jmsTime . " seconds" . PHP_EOL;
//
//echo "Symfony is " . ($symfonyTime / $jsonTime) . " slower then json encode" . PHP_EOL;
//echo "JMS is " . ($jmsTime / $jsonTime) . " slower then json encode" . PHP_EOL;
//
//echo ($jmsTime > $symfonyTime) ? "Symfony Serializer is " . ($jmsTime / $symfonyTime) . " faster then JMS" :
//    "JMS is " . ($jmsTime / $symfonyTime) . " faster then Symfony Serializer";







