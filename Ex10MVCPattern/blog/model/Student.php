<?php
/**
 * Created by PhpStorm.
 * User: nguyen nhung
 * Date: 2/1/2018
 * Time: 17:04
 */

namespace Model;


class Student
{
    public $id;
    public $name;
    public $email;
    public $address;
    public $phone;
    public $image;

    public function __construct($id, $name, $email, $address, $phone, $image)
    {
        $this -> id = $id;
        $this -> name = $name;
        $this ->email = $email;
        $this -> address = $address;
        $this -> phone = $phone;
        $this ->image = $image;
    }


}