<?php
require_once "database/Database.php";
$db = new database();
$conn = $db -> connect();
$categories_statement = $conn->query("SELECT * FROM categories ");
$categories = $categories_statement->fetchAll();
$author_statement = $conn->query("SELECT * FROM authors ");
$authors = $author_statement->fetchAll();
?>
<div class="container">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" >
        <h3>Add Book</h3>
        <div class="form-group">
            <label class="control-label col-sm-2" >Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Enter name" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Price:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter price" name="price">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Quality:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Enter quality" name="quality">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Category:</label>
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
<a href="index.php?page=books">go back</a>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quality = $_POST['quality'];
    $category_id = $_POST['category_id'];
    $author_id = $_POST['author_id'];
    move_uploaded_file($_FILES["imageBook"]["tmp_name"],"images/imgBook/" . $_FILES["imageBook"]["name"]);
    $imageBook=$_FILES["imageBook"]["name"];
    $books_statement = $conn->query("INSERT INTO books VALUES ('','$name', '$price', '$imageBook', '$quality','$category_id', '$author_id')");
    echo "data add successfully";
}
?>
