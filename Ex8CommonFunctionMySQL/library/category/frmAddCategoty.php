<?php
require_once "database/Database.php";
$db = new database();
$conn = $db -> connect();
$categories_statement = $conn->query("SELECT * FROM categories ");
$categories = $categories_statement->fetchAll();
?>
<div class="container">
    <h2>Reader List</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $index => $category):?>
            <tr>
                <td><?php echo ($index +1)?></td>
                <td><?php echo $category['categoryName']?></td>
                <td><?php echo "<a href=\"category\deleteCategory.php?id=$category[id]\" onclick=\"return confirm('are you sue delete')\">Delete</a>
                    <a href=\"category/editCategory.php?id=$category[id]\" style=\"margin: 10px\">Edit</a>"?>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <a href="index.php?page=addCategory">Add new reader</a>

</div>
