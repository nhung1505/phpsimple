<div class="container">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" >
        <h3>Add Reader</h3>
        <div class="form-group">
            <label class="control-label col-sm-2" >Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Enter name" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Email:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Address:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Enter address" name="address">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Phone:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Enter phone" name="phone">
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
<a href="index.php?page=students">go back</a>
<?php
require_once 'database/database.php';
$db = new Database();
$conn = $db->connect();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    move_uploaded_file($_FILES["image"]["tmp_name"],"images/imgStudent/" . $_FILES["image"]["name"]);
    $image=$_FILES["image"]["name"];
    $students_statement = $conn->query("INSERT INTO students VALUES ('', '$name', '$email', '$address', '$phone', '$image')");
    echo "data add successfully";
}
?>
