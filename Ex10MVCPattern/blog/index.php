<?php
require "model/DBConnection.php";
require "model/Student.php";
require "model/StudentDB.php";
require "controller/StudentController.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="glyphicon-menu-up">
            <?php include "view/layout/header.php"; ?>
            <?php include "view/layout/menu.php"; ?>
        </div>
        <div class="modal-content">
            <div class="container">
            <?php
            $controller = new \Controller\StudentController();
            $page = isset($_REQUEST['page'])?$_REQUEST['page']:null;
            switch ($page){
                case 'view':
                    $controller->view();
                    break;
                case 'add':
                    $controller->add();
                    break;
                default:
                    $controller->index();
                    break;
            }

            ?>
            </div>
        </div>
        <div class="footer">
            <?php include "view/layout/footer.php"?>
        </div>
    </div>
</div>

</body>
</html>
