<h2>Reader List</h2>
<table class="table table-striped">
    <thead>
    <tr>
        <th></th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $index=>$student):?>
        <tr>
            <td><?php echo ($index +1) ?></td>
            <td><?php echo $student->name ?></td>
            <td><?php echo $student->email ?></td>
            <td><?php echo $student->phone ?></td>
            <td><?php echo $student->address ?></td>
            <td><img style="height: 50px; width: auto" src="css/image/imageStudents/<?php echo $student->image?>" alt=""></td>
            <td>
                <a href="">Update</a>
                <a href="">Delete</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<p>
    <a href="index.php?page=add" class="btn btn-primary">Create new student</a>
</p>

<!--            <td>--><?php //echo "<a href=\"student\deleteStudent.php?id=$student[id]\" onclick=\"return confirm('are you sue delete')\">Delete</a>
//                    <a href=\"student/editStudent.php?id=$student[id]\" style=\"margin: 10px\">Edit</a>"?>
<!--            </td>-->
