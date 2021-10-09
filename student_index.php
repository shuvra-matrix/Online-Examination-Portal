<?php
include "./include/logout.php"; 
include "./include/head.php";
include "./include/navbar.php";

$name =  $_SESSION['name'];

?>
<div class="student_main_div">
    <div class="student_sub_div" >
        <h5>Hi! <?php echo $name;   ?></h5>
        <ul>
            <li>Select Topic And Click Start Button To Your Exam</li>
            <li>This Is MCQ Type Exam</li>
            <li>Each Question Has 4 Options</li> 
        </ul>
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
                    <h5><?php echo $row['topic_name'];  ?></h4>
                    <input type="hidden" name="id" value="<?php  echo $row['id'];    ?>">
                    <button class="student_button" onclick="return confirm('Are you sure you want start your exam?')">Start</button>
                </form>
            </div>
        <?php $div_no = $div_no + 1; } ?>
    </div>


</div>


</html>