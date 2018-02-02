<?php
require_once "database/Database.php";
$db = new database();
$conn = $db -> connect();

$students_statement = $conn->query("SELECT * FROM students ");
$students = $students_statement->fetchAll();
?>
<div class="container">
    <h2>Reader List</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $index => $student):?>
        <tr>
            <td><?php echo ($index +1)?></td>
            <td><?php echo $student['name']?></td>
            <td><?php echo $student['email']?></td>
            <td><?php echo $student['address']?></td>
            <td><?php echo $student['phone']?></td>
            <td><img style="height: 50px; width: auto" src="images/imgStudent/<?php echo $student['image']; ?>"></td>
            <td><?php echo "<a href=\"student\deleteStudent.php?id=$student[id]\" onclick=\"return confirm('are you sue delete')\">Delete</a>
                    <a href=\"student/editStudent.php?id=$student[id]\" style=\"margin: 10px\">Edit</a>"?>
            </td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <a href="index.php?page=addStudent">Add new reader</a>

</div>
