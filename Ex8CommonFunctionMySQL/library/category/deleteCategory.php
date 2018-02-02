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
$categories_statement =$conn->query("DELETE FROM categories WHERE id = $id ");
header("Location:../index.php?page=categories");
