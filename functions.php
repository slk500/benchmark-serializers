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
        $book1->setAuthor($faker->name());
        $book1->setTitle($faker->title);

        $book2 = new Book;
        $book1->setAuthor($faker->name());
        $book1->setTitle($faker->title);

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

        $persons [] = $person;
    }
    return $persons;
}

function createFilesData()
{
    file_put_contents('10.txt', serialize(makePersons(10)), FILE_APPEND);
    file_put_contents('100.txt', serialize(makePersons(100)), FILE_APPEND);
    file_put_contents('1000.txt', serialize(makePersons(1000)), FILE_APPEND);
    file_put_contents('10000.txt', serialize(makePersons(10000)), FILE_APPEND);
    file_put_contents('100000.txt', serialize(makePersons(100000)), FILE_APPEND);
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
