<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Product manager</h2>
    <div id="sidebar">
        <h3>Categories</h3>
        <?php include 'categories.php'; ?>
    </div>
    <form class="form-horizontal" method="POST" >
        <h3>New product</h3>
        <div class="form-group">
            <label class="control-label col-sm-2" for="category">Category:</label>
            <div class="col-sm-10">
                <select name="category_id" id="">
                    <option value="1">Guitars</option>
                    <option value="2">Basses</option>
                    <option value="3">Drums</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Code:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Enter code" name="code">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter name" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Price:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Enter price" name="price">
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-10"></div>
            <div class=" col-md-1">
                <button type="submit" class="btn btn-default">Create</button>
            </div>
            <div class="col-md-1">
                <button type="reset" class="btn btn-default">Cancel</button>
            </div>
        </div>
    </form>
</div>

<?php
require_once 'Database.php';
$db = new Database();
$conn = $db->connect();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    if (empty($code) || empty($name) || empty($price) || empty($category_id)) {
        if (empty($name)) {
            echo "Name fail is empty";
        }
        if (empty($code)) {
            echo "code fail is empty";
        }
        if (empty($price)) {
            echo "price fail is empty";
        }
        if (empty($category_id)) {
            echo "category fail is empty";
        }
        echo "<a>Go back</a>";
    } else {
        $products_statement = $conn->query("UPDATE  products SET products.code ='$code', products.name= '$name', products.price ='$price', products.category_id ='$category_id' WHERE products.id = $id");
        var_dump($products_statement);
        echo "data add successfully";
    }
}

?>

</body>
</html>