<?php
/**
 * Author Sławomir Grochowski <slawomir.grochowski@fachowcy.pl>   
 * Date: 17.05.17
 */

require_once 'vendor/autoload.php';
require_once 'Entity/Person.php';
require_once 'Entity/Book.php';
require_once 'functions.php';

$faker = Faker\Factory::create();

$book1 = new Book;
$book1->setAuthor($faker->name());
$book1->setTitle($faker->title);

$book2 = new Book;
$book2->setAuthor($faker->name());
$book2->setTitle($faker->title);

$person = new Person();
$person->addBook($book1);
$person->addBook($book2);

$person->setJob($faker->jobTitle);
$person->setBirthday($faker->dateTime);
$person->setFirstName($faker->firstName);
$person->setLastName($faker->lastName);
$person->setCity($faker->city);
$person->setPhone($faker->phoneNumber);
$person->setCountry($faker->country);
$person->setEmail($faker->email);
$person->setStreet($faker->streetName);

var_dump($person);

$serializedPerson = serialize($person);

echo $serializedPerson;

$unserializedPerson = unserialize($serializedPerson);

var_dump($unserializedPerson);

