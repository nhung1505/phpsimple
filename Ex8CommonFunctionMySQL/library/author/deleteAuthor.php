<?php
/**
 * Created by PhpStorm.
 * User: nguyen nhung
 * Date: 1/26/2018
 * Time: 14:39
 */
require_once '../database/database.php';
$db = new Database();
$conn = $db->connect();
$id = $_GET['id'];
$authors_statement =$conn->query("DELETE FROM authors WHERE id = $id ");
header("Location:../index.php?page=authors");
