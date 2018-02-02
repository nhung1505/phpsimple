<div class="container">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" >
        <h3>Add Category</h3>
        <div class="form-group">
            <label class="control-label col-sm-2" >Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Enter name" name="categoryName">
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
<a href="index.php?page=categories">go back</a>
<?php
require_once 'database/database.php';
$db = new Database();
$conn = $db->connect();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryName = $_POST['categoryName'];
    $categories_statement = $conn->query("INSERT INTO categories VALUES ('', '$categoryName')");
    echo "data add successfully";
}
?>
