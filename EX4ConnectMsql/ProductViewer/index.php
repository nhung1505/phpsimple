<?php
require_once 'Database.php';

$db = new Database();
$conn = $db->connect();

$category_id = NULL;
if(isset($_GET['category_id'])){
    $category_id = $_GET['category_id'];
} else {
    $category_statement = $conn->query("SELECT id FROM categories LIMIT 1");
    $first_category = $category_statement->fetch();
    $category_id = $first_category['id'];
}
$rows = $conn->query("SELECT * FROM categories");
$products_statement = $conn->query("SELECT * FROM products WHERE `category_id`=".$category_id);
$products = $products_statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Product Viewer</title>
</head>
<body>
<div id="sidebar">
    <h3>Categories</h3>
    <?php include 'categories.php'; ?>
</div>
<div id="content">
    <a href="add.php" style="float:right; padding-bottom: 40px">Create new product</a>
    <h3>Basses</h3>
    <table>
        <tr>
            <th>STT</th>
            <th>Code</th>
            <th>Name</th>
            <th>Price</th>
            <th></th>
        </tr>
        <?php foreach ($products as $index => $product):?>
            <tr>
                <td><?php echo ($index + 1)?></td>
                <td><?php echo $product['code']?></td>
                <td><?php echo $product['name']?></td>
                <td><?php echo $product['price']?></td>
                <td><?php echo "<a href=\"delete.php?id=$product[id]\" onclick=\"return confirm('are you sue delete')\">Delete</a>
                    <a href=\"edit.php?id=$product[id]\" style=\"margin: 10px\">Edit</a>"?>
                </td>
            </tr>
        <?php endforeach; ?>


    </table>
</div>
</body>
</html>