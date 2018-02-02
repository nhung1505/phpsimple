<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
    <style>
        input[type=text] {
            width: 300px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 4px;
            padding: 12px 10px 12px 10px;
        }
        #submit {
            border-radius: 2px;
            padding: 10px 32px;
            font-size: 16px;
        }
    </style></head>
<h2>Category US- VI</h2>
<form method="post">
    <input type="text" name="search" placeholder="input"/>
    <input type = "submit" id = "submit" value = "Search"/>
</form>
<?php
$dictionary = array(
    "hello"=>"xin chào",
    "how"=>"thế nào",
    "book"=>"quyển vở",
    "computer"=>"máy tính",);
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $searchword = $_POST['search'];
    $flag = 0 ;
    foreach($dictionary as $word => $description){
        if($searchword === $word){
            echo $description;
            $flag++;
        }
    }
    if($flag ===0){
        echo "unValue";
    }


}
?>
</body>
</html>