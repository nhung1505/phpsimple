<?php
require_once "database/Database.php";
$db = new database();
$conn = $db -> connect();
$author_statement = $conn->query("SELECT * FROM authors ");
$authors = $author_statement->fetchAll();
?>
<div class="container">
    <h2>Reader List</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($authors as $index => $author):?>
            <tr>
                <td><?php echo ($index +1)?></td>
                <td><?php echo $author['authorName']?></td>
                <td><?php echo $author['description']?></td>
                <td><img style="height: 50px; width: auto" src="images/imgAuthor/<?php echo $author['image']; ?>"></td>
                <td><?php echo "<a href=\"author\deleteAuthor.php?id=$author[id]\" onclick=\"return confirm('are you sue delete')\">Delete</a>
                    <a href=\"author/editAuthor.php?id=$author[id]\" style=\"margin: 10px\">Edit</a>"?>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <a href="index.php?page=addAuthor">Add new reader</a>

</div>
