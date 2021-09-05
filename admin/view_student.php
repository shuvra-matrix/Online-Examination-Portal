<?php
include './include/session.php'; 
include "./include/head.php";
include "./include/navbar.php";

?>

<div>
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>User Id</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM user";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['id'];         ?></td>
                    <td><?php echo $row['user_name'];         ?></td>
                    <td><?php echo $row['user_email'];         ?></td>
                    <td><?php echo $row['user_id'];         ?></td>
                    <td><a style="text-decoration: none; color: green;" href="./student.php?action=update_student&value=<?php echo $row['id'] ?>">Update</a></td>
                    <td><a onclick="return confirm('Are you sure you want to delete?')" style="text-decoration: none; color: red ;" href="./student.php?action=delete_student&value=<?php echo $row['id'] ?>">Delete</a></td>
                </tr>
            <?php }  ?>

        </tbody>
    </table>

</div>