<?php
require_once 'Database.php';

$db = new Database();
$conn = $db->connect();

$rows = $conn->query("SELECT * FROM categories");

?>
<ul>
    <?php foreach($rows as $index => $row):?>
        <li><a href="index.php?category_id=<?php echo $row['id']?>"><?php echo $row['name'];?></a></li>
    <?php endforeach; ?>
</ul>
