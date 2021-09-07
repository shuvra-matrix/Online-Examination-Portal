<?php
include './include/session.php';
include "./include/head.php";
include "./include/navbar.php";


if (isset($_POST['add_topic'])) {
    $name = $_POST['topic_name'];
    $name = mysqli_real_escape_string($connect, $name);
    $query = "INSERT INTO topic(topic_name) VALUES ('$name') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<script> alert('Topic added'); </script>";
    } else {
        $mesage = "something went wrong";
        die($mesage);
    }
}





?>
<div class="admin_main">
    <div class="class_form">
        <form action="" method="POST">
            <div class="admin_sub">
                <label for="name">Topic Name</label>
                <input type="text" name="topic_name">
            </div>
            <div id="btns">
                <button type="submit" name="add_topic" class="btn btn-primary">Add Topic</button>
            </div>
        </form>
    </div>
    <div class="class_topic_table" style="overflow: auto;">
        <table class="table table-striped" style="background-color: #f8c200;">
            <thead>
                <th>ID</th>
                <th>Topic</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php
                $query = "SELECT  * FROM topic";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['topic_name']; ?></td>
                        <td><a style="text-decoration: none; color: green;" href="./update_topic.php?value=<?php echo $row['id'] ?>">Update</a></td>
                        <td><a onclick="return confirm('Are you sure you want to delete?')" style="text-decoration: none; color: red ;" href="./delete.php?from=topic&data=<?php echo $row['id'] ?>">Delete</a></td>
                    </tr><?php } ?>
            </tbody>
        </table>

    </div>

</div>


</html>