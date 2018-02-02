<?php
/**
 * Created by PhpStorm.
 * User: nguyen nhung
 * Date: 1/26/2018
 * Time: 14:39
 */
require_once '../database/database.php';
$db = new Database();
$conn = $db ->connect();
$categoryId = $_GET['id'];
$categories_statement = $conn->query("SELECT * FROM categories WHERE categories.id = $categoryId");
$categories = $categories_statement->fetchAll();
foreach ($categories as $index => $category):
endforeach;
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <?php include "../layout/header.php"; ?>
        <div class="container">
            <form class="form-horizontal" method="POST" enctype="multipart/form-data" >
                <h3>Edit Category</h3>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $category['categoryName']?>" name="name" ></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-10"></div>
                    <div class=" col-md-1">
                        <button type="submit" class="btn btn-default">Edit</button>
                    </div>
                    <div class="col-md-1">
                        <button type="reset" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <a href="../index.php?page=categories">go back</a>
    </div>
    </body>
    </html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $categoryName = $_POST['categoryName'];
    $categories_statement = $conn->query("UPDATE  categories SET categories.categoryName ='$categoryName' WHERE categories.id = $id");
    echo "data edit successfully";
}


?>