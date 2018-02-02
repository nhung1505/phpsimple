<?php
/**
 * Created by PhpStorm.
 * User: nguyen nhung
 * Date: 2/1/2018
 * Time: 17:05
 */

namespace Model;


class StudentDB
{
    public $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAll(){
        $sql = "SELECT * FROM students ";
        $statement = $this -> connection ->prepare($sql);
        $statement ->execute();
        $result = $statement-> fetchAll();
        $students = [];
        foreach ($result as $row){
            $student = new Student($row['id'], $row['name'], $row['email'], $row['address'], $row['phone'], $row['image']);
            $student ->id = $row['id'];
            $students[] = $student;
        }
        return $students;
    }

}