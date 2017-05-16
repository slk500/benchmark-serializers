<?php
require_once 'Entity/Person.php';
require_once 'Entity/Book.php';

$persons = unserialize(file_get_contents('100.txt'));


/**PHP SERIALIZER OBJECTS**/
$startTime = microtime(true);

serialize($persons);

$phpSerializerTime = (microtime(true) - $startTime);

echo "PHP SERIALIZER OBJECTS: " . $phpSerializerTime . " seconds". PHP_EOL;
echo "PHP SERIALIZER OBJECTS: " . $phpSerializerTime * 1000000 . " μs". PHP_EOL;

/**PHP SERIALIZER OBJECTS**/
$startTime = microtime(true);

serialize($persons);

$phpSerializerTime = (microtime(true) - $startTime);

echo "PHP SERIALIZER OBJECTS: " . $phpSerializerTime . " seconds". PHP_EOL;
echo "PHP SERIALIZER OBJECTS: " . $phpSerializerTime * 1000000 . " μs". PHP_EOL;
