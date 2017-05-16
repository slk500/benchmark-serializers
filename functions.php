<?php
/**
 * Created by PhpStorm.
 * User: slk500
 * Date: 16.05.17
 * Time: 10:31
 */
require_once 'vendor/autoload.php';



function convert($size)
{
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}

//echo convert(memory_get_usage(true)) . PHP_EOL;


function makePersons($numberOfPersons)
{
    $faker = Faker\Factory::create();
    $persons = [];

    foreach (range(1, $numberOfPersons) as $i) {

        $book1 = new Book;
        $book1->setAuthor('Autor1');
        $book1->setTitle('Książka1');

        $book2 = new Book;
        $book2->setAuthor('Autor2');
        $book2->setTitle('Książka2');

        $person = new Person();
        $person->addBook($book1);
        $person->addBook($book2);

        $person->setFirstName($faker->firstName);
        $person->setLastName($faker->lastName);
        $person->setCity($faker->city);
        $person->setPhone($faker->phoneNumber);
        $person->setCountry($faker->country);
        $person->setEmail($faker->email);
        $person->setStreet($faker->streetName);

        $persons [] = $person;
    }
    return $persons;
}

function personsFromArray($inputArray)
{
    $persons = [];
    foreach ($inputArray as $array)
    {
        $person = new Person();
        $person->firstName = $array['firstName'];

        foreach ($array['books'] as $arrBook)
        {
            $book = new Book();
            $book->title = $arrBook['title'];
            $book->author = $arrBook['author'];

            $person->addBook($book);
        }

        $person->lastName = $array['lastName'];
        $person->city = $array['city'];
        $person->street = $array['street'];
        $person->phone = $array['lastName'];
        $person->country = $array['lastName'];
        $person->email = $array['lastName'];

        $persons []= $person;
    }
    return $persons;
}
