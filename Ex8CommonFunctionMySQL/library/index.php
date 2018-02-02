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
    <?php include "layout/header.php"; ?>
</div>
<?php include "layout/menu.php"; ?>
<?php
$page = NULL;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
switch ($page){
    case 'deleteStudent':
        include "student/deleteStudent.php";
        break;
    case 'addStudent':
        include "student/addStudent.php";
        break;
    case 'addBook':
        include "book/addBook.php";
        break;
    case 'deleteBook':
        include "book/deleteBook.php";
        break;
    case 'editCategory':
        include "category/editCategory.php";
        break;
    case 'addCategory':
        include "category/addCategory.php";
        break;

    case 'addAuthor':
        include "author/addAuthor.php";
        break;
    case 'editAuthor':
        include "author/editAuthor.php";
        break;
    default:
        include "student/frmAddStudent.php";
}
?>

</body>
</html>