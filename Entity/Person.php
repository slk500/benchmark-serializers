<?php
/**
 * Created by PhpStorm.
 * User: slk500
 * Date: 12.05.17
 * Time: 23:36
 */


class Person implements JsonSerializable
{
    private $firstName;
    private $lastName;
    private $city;
    private $street;
    private $phone;
    private $country;
    private $email;
    private $birthday;
    private $job;
    private $books = [];

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param mixed $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }


    public function getFirstName()
    {
        return $this->firstName;
    }


    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }


    public function getLastName()
    {
        return $this->lastName;
    }


    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }


    public function getCity()
    {
        return $this->city;
    }


    public function setCity($city)
    {
        $this->city = $city;
    }


    public function getStreet()
    {
        return $this->street;
    }


    public function setStreet($street)
    {
        $this->street = $street;
    }


    public function getPhone()
    {
        return $this->phone;
    }


    public function setPhone($phone)
    {
        $this->phone = $phone;
    }


    public function getCountry()
    {
        return $this->country;
    }


    public function setCountry($country)
    {
        $this->country = $country;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @param mixed $books
     */
    public function setBooks($books)
    {
        $this->books = $books;
    }

    public function addBook($book)
    {
        $this->books[] = $book;
    }


//    public function serialize()
//    {
//        return [
//            'firstName' => $this->firstName,
//            'lastName' => $this->lastName,
//            'city' => $this->city,
//            'street' => $this->street,
//            'phone' => $this->phone,
//            'country' => $this->country,
//            'email' => $this->email
//        ];
//    }
//
//    public function unserialize($serialized)
//    {
//
//    }

    function jsonSerialize()
    {
        return [
            'firstName' => $this->firstName,
            'books' => $this->books,
            'lastName' => $this->lastName,
            'city' => $this->city,
            'street' => $this->street,
            'phone' => $this->phone,
            'country' => $this->country,
            'email' => $this->email
        ];
    }

//    function jsonSerialize()
//    {
//        return [
//            'firstName' => $this->getFirstName(),
//            'lastName' => $this->getLastName(),
//            'city' => $this->getCity(),
//            'street' => $this->getStreet(),
//            'phone' => $this->getPhone(),
//            'country' => $this->getCountry(),
//            'email' => $this->getEmail()
//        ];
//    }





}