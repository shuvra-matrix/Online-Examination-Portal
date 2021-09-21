<?php
if (isset($_POST['add_topic'])) {
    $name = $_POST['topic_name'];
    $name = strings($name);
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
                <input class="admin_input" type="text" name="topic_name" placeholder="Topic Name" required>
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
                        <td><a name='update' style="text-decoration: none; color: green;" href="./topic.php?action=update_topic&value=<?php echo $row['id'] ?>">Update</a></td>
                        <td><a name='delete' onclick="return confirm('Are you sure you want to delete?')" style="text-decoration: none; color: red ;" href="./topic.php?action=delete_topic&from=topic&data=<?php echo $row['id'] ?>">Delete</a></td>
                    </tr><?php } ?>
            </tbody>
        </table>

    </div>

</div>


