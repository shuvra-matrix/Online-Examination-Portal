
<div style="width: 90% ; margin: auto; overflow: auto;">
    <table class="table table-striped" style="background-color: #f8c200;">
        <thead>
            <th>Id</th>
            <th>Questions</th>
            <th>Options 1</th>
            <th>Options 2</th>
            <th>Options 3</th>
            <th>Options 4</th>
            <th>Topic</th>
            <th>Ans</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM questions";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {

                $topic_id = $row['topic'];
                $querys = "SELECT * FROM topic WHERE id = '$topic_id'";
                $results = mysqli_query($connect, $querys);
                $rows = mysqli_fetch_assoc($results);
            ?>
                <tr>
                    <td><?php echo $row['id'];         ?></td>
                    <td><?php echo $row['question'];         ?></td>
                    <td><?php echo $row['option1'];         ?></td>
                    <td><?php echo $row['option2'];         ?></td>
                    <td><?php echo $row['options3'];         ?></td>
                    <td><?php echo $row['options4'];         ?></td>
                    <td><?php echo $rows['topic_name'];          ?></td>
                    <td><?php echo $row['ans'];         ?></td>
                    <td><a name='update' style="text-decoration: none; color: green;" href="./question.php?action=update_question&value=<?php echo $row['id'] ?>">Update</a></td>
                    <td><a name='delete' onclick="return confirm('Are you sure you want to delete?')" style="text-decoration: none; color: red ;" href="./question.php?action=delete_question&data=<?php echo $row['id'] ?>">Delete</a></td>
                </tr>
            <?php }  ?>

        </tbody>
    </table>

</div>