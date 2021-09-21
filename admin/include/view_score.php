
<div style="width: 90% ; margin: auto; overflow: auto;">
    <table class="table table-striped" >
        <thead>
            <th>Id</th>
            <th>User Id</th>
            <th>User Name</th>
            <th>Topic Name</th>
            <th>User Score</th>
            <th>Date & Time</th>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM user_score";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            
            $id = $row['id'];
            $user_id = $row['user_id'];
            $user_name = $row['name'];
            $topic_id = $row['topic_id'];
            $topic_query = "SELECT * FROM topic WHERE id = '$topic_id' ";
            $topic_result = mysqli_query($connect,$topic_query);
            $topic_row = mysqli_fetch_assoc($topic_result);
            $topic_name = $topic_row['topic_name'];
            $user_score = $row['score'];
            $date = $row['date'];
            
            ?>
                <tr>
                    <td><?php echo $id;         ?></td>
                    <td><?php echo $user_id;         ?></td>
                    <td><?php echo $user_name;         ?></td>
                    <td><?php echo $topic_name;         ?></td>
                    <td><?php echo $user_score;         ?></td>
                    <td><?php echo $date;         ?></td>
                </tr>
            <?php }  ?>

        </tbody>
    </table>

</div>
