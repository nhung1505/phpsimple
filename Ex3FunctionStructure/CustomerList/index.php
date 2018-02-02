<?php
$customer_list = array(
        "1" => array("name" => "nguyen van a", "day_of_birth" => "1997/05/14", "address" => "ha noi", "profile" => "images/img1.jpg"),
        "2" => array("name" => "nguyen van b", "day_of_birth" => "1997/05/15", "address" => "nghe an", "profile" => "images/img2.jpg"),
        "3" => array("name" => "nguyen van c", "day_of_birth" => "1997/05/16", "address" => "thai nguyen", "profile" => "images/img3.jpg"),
        "4" => array("name" => "nguyen van d", "day_of_birth" => "1997/05/17", "address" => "nam dinh", "profile" => "images/img4.jpg"),
        "5" => array("name" => "nguyen van e", "day_of_birth" => "1997/05/18", "address" => "khanh hoa", "profile" => "images/img5.jpg"),
        "6" => array("name" => "nguyen van f", "day_of_birth" => "1997/05/19", "address" => "tuyen quang", "profile" => "images/img1.jpg")
);
function searchByDate($customers, $from_date, $to_date){
    if(empty($from_date) && empty($to_date)){         // empty là hàm kiểm tra sự tồn tại.
        return $customers;
    }

    $filtered_customers = [];
    foreach ($customers as $customer){
        if(!empty($from_date) && (strtotime($customer['day_of_birth']) < strtotime($from_date))){
            continue;
        }
        if(!empty($to_date) && (strtotime($customer['day_of_birth']) > strtotime($to_date))){
            continue;
        }
        $filtered_customers[] = $customer;
    }
    return $filtered_customers;

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
</style>
<body>
<?php
$from_date = NULL;
$to_date = NULL;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_date = $_POST["from"];
    $to_date = $_POST["to"];
}
$filtered_customers = searchByDate($customer_list, $from_date, $to_date);
?>
<form method="post">
    From: <input id = "from" type="text" name="from" placeholder="yy/mm/dd" value="<?php echo isset($from_date)?$from_date:''; ?>"/>
    To: <input id = "to" type="text" name="to" placeholder="yy/mm/dd" value="<?php echo isset($to_date)?$to_date:''; ?>"/>
    <input type = "submit" id = "submit" value = "Search"/>
</form>

<table border="0">
    <caption><h2>Danh sách khách hàng</h2></caption>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Ảnh</th>
    </tr>
    <?php foreach($filtered_customers as $index=> $customer): ?>
        <tr>
            <td><?php echo $index + 1;?></td>
            <td><?php echo $customer['name'];?></td>
            <td><?php echo $customer['day_of_birth'];?></td>
            <td><?php echo $customer['address'];?></td>
            <td  width = '60px' height ='60px' style='overflow: hidden'><img  width = '100%' height ='100%' src="<?php echo $customer['profile'];?>"/> </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>