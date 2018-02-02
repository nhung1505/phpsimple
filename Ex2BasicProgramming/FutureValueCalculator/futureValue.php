<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
$investmentAmount = $_POST['investmentAmount'];
$yearlyInterestRate = $_POST['yearlyInterestRate'];
$numberOfYears = $_POST['numberOfYears'];
$futureValue = $investmentAmount;
for($i=0; $i < $numberOfYears; $i++){
    $futureValue = $futureValue + ($futureValue * $yearlyInterestRate/100);
}
?>

<h2>Form Future Value Calculator</h2>
<form>
    <div class="container">
        <label><b>Investment Amount</b></label>
        <span><?php echo $investmentAmount."$"?></span>
        <label><b>Yearly Interest Rate</b></label>
        <span> <?php echo  $yearlyInterestRate."%"?></span>
        <label><b>Number Of Years </b></label>
        <span> <?php echo $numberOfYears?></span>
        <label><b>Future Value </b></label>
        <span> <?php echo $futureValue."$"?></span>
    </div>
</form>

</body>
</html>
