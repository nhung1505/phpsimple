<?php
require_once "database/Database.php";
$db = new database();
$conn = $db -> connect();
$books_statement = $conn->query("SELECT * FROM books JOIN categories ON books.category_id = categories.id 
                                                            JOIN authors ON books.author_id = authors.id");
$books = $books_statement->fetchAll();
?>
<div class="container">
    <h2>Reader List</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Price</th>
            <th>Quality</th>
            <th>Category</th>
            <th>Author</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $index => $book):?>
            <tr>
                <td><?php echo ($index +1)?></td>
                <td><?php echo $book['name']?></td>
                <td><?php echo $book['price']?></td>
                <td><?php echo $book['quality']?></td>
                <td><?php echo $book['categoryName']?></td>
                <td><?php echo $book['authorName']?></td>
                <td><img style="height: 50px; width: auto" src="images/imgBook/<?php echo $book['imageBook']; ?>"></td>
                <td><?php echo "<a href=\"book\deleteBook.php?id=$book[bookId]\" onclick=\"return confirm('are you sue delete')\">Delete</a>
                    <a href=\"book/editBook.php?id=$book[bookId]\" style=\"margin: 10px\">Edit</a>"?>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <a href="index.php?page=addBook">Add new reader</a>

</div>
