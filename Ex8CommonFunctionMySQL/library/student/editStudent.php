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
$studentId = $_GET['id'];
$students_statement = $conn->query("SELECT * FROM students WHERE students.id = $studentId");
$students = $students_statement->fetchAll();
foreach ($students as $index => $student):
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
            <h3>Edit Reader</h3>
            <div class="form-group">
                <label class="control-label col-sm-2" >Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $student['name']?>" name="name" ></div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $student['email']?>" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Address:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?php echo $student['address']?>" name="address">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Phone:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="<?php echo $student['phone']?>" name="phone">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Image:</label>
                <div class="col-sm-10">
                    <div><img style="height: 50px; width: auto" src="../images/imgStudent/<?php echo $student['image']; ?>"></div>
                    <input type="file" class="form-control" name="image">
                </div>
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
    <a href="../index.php?page=students">go back</a>
</div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    move_uploaded_file($_FILES["image"]["tmp_name"],"../images/imgStudent/" . $_FILES["image"]["name"]);
    $image=$_FILES["image"]["name"];
    $students_statement = $conn->query("UPDATE  students SET students.name ='$name', students.phone= '$phone', students.address ='$address', students.email ='$email', students.image= '$image' WHERE students.id = $id");
    echo "data edit successfully";
}


?>