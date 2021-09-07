<?php
include "./include/logout.php"; 
include "./include/head.php";
include "./include/navbar.php";

$name =  $_SESSION['name'];

?>
<div>
    <div class="student_sub_div" >
        <h5>Hi! <?php echo $name;   ?></h5>
        <p>Select Topic To Start Your Exam</p>
    </div>
    <div class="topic_main">

        <?php
        $query = "SELECT * FROM topic";
        $result = mysqli_query($connect, $query);
        $div_no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>


            <div class="topic_sub topic_sub_<?php  echo $div_no;  ?>">
                <form action="take_exam.php" method="POST">
                    <h4><?php echo $row['topic_name'];  ?></h4>
                    <input type="hidden" name="id" value="<?php  echo $row['id'];    ?>">
                    <button class="btn btn-success">Start</button>
                </form>
            </div>
        <?php $div_no = $div_no + 1; } ?>
    </div>


</div>


</html>