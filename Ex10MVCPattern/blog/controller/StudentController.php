<?php
namespace Controller;
use Model\DBConnection;
use Model\StudentDB;

class StudentController
{
    public $studentDB;

    public function __construct()
    {
        $connection = new DBConnection('mysql:host=localhost;dbname=library','root','');
        $this->studentDB = new StudentDB($connection->connect());
    }

    public function index(){
        $students = $this->studentDB->getAll();
        include 'view/student/list.php';

    }

}