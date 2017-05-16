<?php
/**
 * Created by PhpStorm.
 * User: slk500
 * Date: 09.05.17
 * Time: 21:02
 */

class Mario
{
    public $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function toArray()
    {
        return [
          'mario' => $this->getName()
        ];
    }


}

$mario = new Mario();
$mario->setName('Mariooo');

$arr = [$mario,$mario];


echo json_encode($arr);

//print_r($mario);
//
//echo json_encode($mario->toArray());
//
//$test = serialize($mario);
//
//echo $test;