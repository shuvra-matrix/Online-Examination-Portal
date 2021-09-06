<?php
include "./include/head.php";
include "./include/navbar.php";

session_start();
$name =  $_SESSION['name'];

?>
<div>
    <div>
        <h4>Hi! <?php echo $name;   ?></h4>
    </div>
    <div class="topic_main">

        <?php
        $query = "SELECT * FROM topic";
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>


            <div class="topic_sub">
                <form action="take_exam.php" method="POST">
                    <h4><?php echo $row['topic_name'];  ?></h4>
                    <input type="hidden" name="id" value="<?php  echo $row['id'];    ?>">
                    <button class="btn btn-success">Start</button>
                </form>
            </div>
        <?php  } ?>
    </div>


</div>


</html>