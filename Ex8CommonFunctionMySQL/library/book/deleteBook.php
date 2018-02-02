<?php
/**
 * Created by PhpStorm.
 * User: nguyen nhung
 * Date: 1/29/2018
 * Time: 17:09
 */
require_once '../database/database.php';
$db = new Database();
$conn = $db->connect();
$id = $_GET['id'];
$books_statement =$conn->query("DELETE FROM books WHERE bookId = $id ");
header("Location:../index.php?page=books");