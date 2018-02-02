<?php
class Database
{
    private $url = 'mysql:host=localhost;dbname=test';
    private $user = 'root';
    private $password = '';

    public function connect(){
        return new PDO($this->url, $this->user, $this->password);
    }
}
?>