<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form {
            border: 3px solid #f1f1f1;
        }

        span{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<?php
$description = $_POST["description"];
$price = $_POST["price"];
$discount = $_POST["discount"];
$discount_amount = $price * $discount * 0.1;
?>
<div class="container">
    <label><b>Product Description</b></label>
    <span> <?php echo $description ?></span>
    <label><b>List Price</b></label>
    <span><?php echo $price ?></span>
    <label><b>Discount Percent</b></label>
    <span><?php echo $discount ?></span>
    <label><b>Discount amount</b></label>
    <span> <?php echo $discount_amount ?></span>
</div>
</body>
</html>
