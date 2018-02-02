<?php
class Person
{
    public $name = 'Jonh';
    public $age = 18;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function walk(){
        echo 'hello';
    }
};

    $jonh = new Person('nhung',13);
    $bill = new Person('nam',12);
//    echo $jonh->age;
$jonh ->walk();
