<div class="container">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" >
        <h3>Add Author</h3>
        <div class="form-group">
            <label class="control-label col-sm-2" >Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Enter name" name="authorName">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Description:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Enter description" name="description">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Image:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="image">
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
<a href="index.php?page=authors">go back</a>
<?php
require_once 'database/database.php';
$db = new Database();
$conn = $db->connect();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authorName = $_POST['authorName'];
    $description = $_POST['description'];
    move_uploaded_file($_FILES["image"]["tmp_name"],"images/imgAuthor/" . $_FILES["image"]["name"]);
    $image=$_FILES["image"]["name"];
    $authors_statement = $conn->query("INSERT INTO authors VALUES ('', '$authorName','$description', '$image')");
    echo "data add successfully";
}
?>
