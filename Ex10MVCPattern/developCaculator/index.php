
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        form {
            border: 3px solid #f1f1f1;
        }

        input {
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

<form method="post">
    <div class="container">
        <h1>Simple calculator</h1>
        <label><b>First Number</b></label>
        <input type="text" placeholder="first number" name="firstNumber"  value="<?php echo isset($firstNumber)?$firstNumber:''; ?>" required>
        <h3>Operator</h3>
        <select name="operator" id="">
            <option value="+">Addiction (+)</option>
            <option value="-">Subtraction (-)</option>
        </select>
        </label>
        <h3>Second Number</h3>
        <input type="text" placeholder="second number" name="secondNumber"  value="<?php echo isset($secondNumber)?$secondNumber:''; ?>" required>
        <label><b>Result: </b></label>
        <span>
            <?php
            require 'Calculator.php';
            require 'AddOperator.php';
            require 'SubOperator.php';
            $result = null;
            $firstNumber = 0;
            $secondNumber = 0;
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $firstNumber = $_POST['firstNumber'];
                $secondNumber = $_POST['secondNumber'];
                $operator = $_POST['operator'];
                switch ($operator){
                    case  '+':
                        $calculator = new Calculator(new AddOperator());
                        break;
                    case  '-':
                        $calculator = new Calculator(new SubOperator());
                        break;
                }ak;
                $result = $calculator->execute($firstNumber, $secondNumber);
            }
            ?>
            <h3 style="text-align: center"><?=$result?></h3>
        </span>
        <button type="submit" > Calculate</button>
    </div>
</form>

</body>
</html>
