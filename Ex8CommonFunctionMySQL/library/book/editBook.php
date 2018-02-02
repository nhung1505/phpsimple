<?php
require_once '../database/database.php';
$db = new database();
$conn = $db -> connect();
$categories_statement = $conn->query("SELECT * FROM categories ");
$categories = $categories_statement->fetchAll();
$author_statement = $conn->query("SELECT * FROM authors ");
$authors = $author_statement->fetchAll();

$bookId = $_GET['id'];
$books_statement = $conn->query("SELECT * FROM books JOIN categories ON books.category_id = categories.id 
                                                            JOIN authors ON books.author_id = authors.id  WHERE books.bookId = $bookId");
$books = $books_statement->fetchAll();
foreach ($books as $index => $book):
endforeach;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <?php include "../layout/header.php"; ?>
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" >
        <h3>Edit Book</h3>
        <div class="form-group">
            <label class="control-label col-sm-2" >Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  value="<?php echo $book['name']?>" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Price:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $book['price']?>" name="price">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Quality:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $book['quality']?>" name="quality">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Category:</label>
            <div class="col-sm-10">
                <select name="category_id" id="">
                    <?php foreach ($categories as $category):?>
                        <option value="<?php echo $category['id']?>"><?php echo $category['categoryName']?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Author:</label>
            <div class="col-sm-10">
                <select name="author_id" id="">
                    <?php foreach ($authors as $author):?>
                        <option value="<?php echo $author['id']?>"><?php echo $author['authorName']?></option>
                    <?php endforeach;?>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Image:</label>
            <div class="col-sm-10">
                <div><img style="height: 50px; width: auto" src="../images/imgBook/<?php echo $book['imageBook']; ?>"></div>
                <input type="file" class="form-control" name="imageBook">
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-10"></div>
            <div class=" col-md-1">
                <button type="submit" class="btn btn-default">Create</button>
            </div>
            <div class="col-md-1">
                <button type="reset" class="btn btn-default">Cancel</button>
            </div>
        </div>
    </form>
</div>
<a href="../index.php?page=books">go back</a>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quality = $_POST['quality'];
    $category_id = $_POST['category_id'];
    $author_id = $_POST['author_id'];
    move_uploaded_file($_FILES["imageBook"]["tmp_name"],"../images/imgBook/" . $_FILES["imageBook"]["name"]);
    $imageBook=$_FILES["imageBook"]["name"];
    $books_statement = $conn->query("UPDATE books SET books.name ='$name', books.price= '$price', books.imageBook= '$imageBook',
 books.quality= '$quality', books.category_id= '$category_id', books.author_id= '$author_id' WHERE books.bookId = $id");
    var_dump($books_statement);
    echo "data edit successfully";
}
?>
