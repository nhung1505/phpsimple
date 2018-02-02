<?php
/**
 * Created by PhpStorm.
 * User: nguyen nhung
 * Date: 1/25/2018
 * Time: 22:11
 */
class Database{
    private $url = 'mysql:host=localhost;dbname=library';
    private $user = 'root';
    private $password = '';
    public function connect(){
        return new PDO($this->url, $this->user, $this->password);
    }
}