<?php
/**
 * Created by PhpStorm.
 * User: nguyen nhung
 * Date: 1/24/2018
 * Time: 17:27
 */
require_once 'database.php';
$db = new Database();
$conn = $db->connect();
$id = $_GET['id'];
$products_statement =$conn->query("DELETE FROM products WHERE id = $id");
header("Location:index.php");
