<?php

/**
 * Created by PhpStorm.
 * User: slk500
 * Date: 14.05.17
 * Time: 12:35
 */
class Book
{
    public $title;
    public $author;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }




}