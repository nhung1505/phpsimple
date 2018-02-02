<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text], input[type=password] {
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

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 20%;
            border-radius: 50%;
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
function loadRegistrations($filename){
    $jsondata = file_get_contents($filename);
    $arr_data = json_decode($jsondata, true);
    return $arr_data;
}

function saveDataJSON($filename, $name, $email, $phone){
    try{
        $contact = array(
            'username' => $name,
            'email' => $email,
            'telephone' => $phone
        );
        // converts json data into array
        $arr_data = loadRegistrations($filename);
        // push member data to array
        array_push($arr_data, $contact);
        //convert update array to JSON
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
        //write json data into data.json file
        file_put_contents($filename, $jsondata);
        echo "<h1 style='color: #4CAF50'>Save Success </h1>";
    } catch (Exception $e){
        echo 'ERROR:', $e -> getMessage(), "\n";
    }
}
$nameErr = NULL;
$emailErr = NULL;
$phoneErr = NULL;
$name = NULL;
$email = NULL;
$phone = NULL;
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['telephone'];
    $has_error = false;

    if(empty($name)){
        $nameErr = " Registered name not null";
        $has_error = true;
    }

    if(empty($email)){
        $nameErr = "Registered email not null";
        $has_error = true;
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invalid Email (x@x.x.x)";
            $has_error = true;
        }
    }

    if(empty($phone)){
        $phoneErr = "Registered telephone not null";
    }else{
        if(!filter_var($phone, FILTER_VALIDATE_INT)){
            $phoneErr = "Invalid Phone (1223333)";
            $has_error = true;
        }
    }

    if($has_error === false){
        saveDataJSON("users.json", $name, $email, $phone);
    }

}
?>

<h2>Login Form</h2>

<form method="post">
    <div class="imgcontainer">
        <img src="../images/img3.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label><b>*Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" value="<?php echo $name;?>" required>
        <span class="error"><?php echo $nameErr;?></span>

        <label><b>*Email</b></label>
        <input type="text" placeholder="Email" name="email" value="<?php echo $email;?>" required>
        <span class="error"><?php echo $emailErr;?></span>

        <label><b>*Telephone</b></label>
        <input type="text" placeholder="Telephone" name="telephone" value="<?php echo $phone?>" required>
        <span class="error"><?php echo $phoneErr;?></span>

        <button type="submit">Login</button>
        <label>
            <input type="checkbox" checked="checked"> Remember me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
</form>

<?php
$registrations = loadRegistrations('users.json');
?>
<h2>Registration list</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <?php foreach ($registrations as $registration):?>
    <tr>
        <td><?php echo $registration['username'];?></td>
        <td><?php echo $registration['email'];?></td>
        <td><?php echo $registration['telephone'];?></td>
    </tr>
    <?php endforeach; ?>
</table>


</body>
</html>
