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

<h2>Form Future Value Calculator</h2>
<form method="post" action="futureValue.php">
    <div class="container">
        <label><b>Investment Amount</b></label>
        <input type="text" placeholder="Investment Amount" name="investmentAmount" required>
        <label><b>Yearly Interest Rate</b></label>
        <input type="text" placeholder="Yearly Interest Rate" name="yearlyInterestRate" required>
        <label><b>Number Of Years </b></label>
        <input type="text" placeholder="Number Of Years" name="numberOfYears" required>
        <button type="submit" > Calculate</button>
    </div>
</form>

</body>
</html>
