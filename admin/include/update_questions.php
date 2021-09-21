<?php

$id = $_GET['value'];
$id = mysqli_real_escape_string($connect, $id);

$query = "SELECT * FROM questions WHERE id = '$id'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update_question'])) {
    $id = $_POST['id'];
    $questions = $_POST['questions'];
    $topic = $_POST['topic'];
    $options1 = $_POST["option_1"];
    $options2 = $_POST["option_2"];
    $options3 = $_POST["option_3"];
    $options4 = $_POST["option_4"];
    $ans = $_POST["ans"];

    $query  = "UPDATE questions SET question='$questions',  option1='$options1', option2='$options2',options3='$options3',options4='$options4',ans='$ans',topic='$topic' WHERE id = '$id'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<script> alert('Question Updated'); 
            window.location.href = './view_questions.php?action=#'; 

        </script>";
    } else {
        $mesage = "Something went wrong";
        die($mesage);
    }
}














?>


<div class="admin_main">
    <form action="" method="POST">
        <div class="admin_sub">
            <label for="name">Questions</label>
            <input type="text" name="questions" value="<?php echo $row['question']; ?>">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        </div>
        <?php
        $topic_id = $row['topic'];
        $query = "SELECT  * FROM topic WHERE id = '$topic_id'";
        $result = mysqli_query($connect, $query);
        $user_topic = mysqli_fetch_assoc($result)  ?>
        <div class="admin_sub">
            <label for="name">Topic</label>
            <select name="topic" id="">
                <option value="<?php echo $user_topic['id'];  ?>"> <?php echo $user_topic['topic_name'];  ?> </option>
                <?php
                $query = "SELECT  * FROM topic";
                $result = mysqli_query($connect, $query);
                while ($top_row = mysqli_fetch_assoc($result)) {
                ?>
                    <option value="<?php echo $top_row['id'];  ?>"><?php echo $top_row['topic_name'];  ?></option>
                <?php } ?>
            </select>
        </div>



        <div class="admin_sub">
            <label for="name">Option 1</label>
            <input type="text" name="option_1" value="<?php echo $row['option1']; ?>">
        </div>
        <div class="admin_sub">
            <label for="name">Option 2</label>
            <input type="text" name="option_2" value="<?php echo $row['option2']; ?>">
        </div>
        <div class="admin_sub">
            <label for="name">Option 3</label>
            <input type="text" name="option_3" value="<?php echo $row['options3']; ?>">
        </div>
        <div class="admin_sub">
            <label for="name">Option 4</label>
            <input type="text" name="option_4" value="<?php echo $row['options4']; ?>">
        </div>
        <div class="admin_sub">
            <label for="name">Ans</label>
            <input type="text" name="ans" value="<?php echo $row['ans']; ?>">
        </div>

        <div id="btns">
            <button type="submit" name="update_question" class="btn btn-success">Update Question</button>
        </div>
    </form>
</div>



</html>