<?php

if (isset($_POST['add_question'])) {
    $questions = $_POST['questions'];
    $questions = strings($questions);
    $topic = $_POST['topic'];
    $topic = strings($topic);
    $options1 = $_POST["option_1"];
    $options1 = strings($options1);
    $options2 = $_POST["option_2"];
    $options2 = strings($options2);
    $options3 = $_POST["option_3"];
    $options3 = strings($options3);
    $options4 = $_POST["option_4"];
    $options4 = strings($options4);
    $ans = $_POST["ans"];
    $ans = strings($ans);

    $query  = "INSERT INTO questions(question,option1,option2,options3,options4,ans,topic) VALUES ('$questions','$options1','$options2','$options3','$options4','$ans','$topic')";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<script> alert('Questions Added'); </script>";
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
            <input class="admin_input" type="text" name="questions" placeholder="Enter Question" required>
        </div>

        <div class="admin_sub">
            <label for="name">Topic</label>
            <select class="admin_input" name="topic" id="" style="border-radius: 16px;" required>
                <option value="">Select Topic</option>
                <?php
                $query = "SELECT  * FROM topic";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <option value="<?php echo $row['id'];  ?>"><?php echo $row['topic_name'];  ?></option>
                <?php } ?>
            </select>
        </div>



        <div class="admin_sub">
            <label for="name">Option 1</label>
            <input class="admin_input" type="text" name="option_1" placeholder="Option No 1" required>
        </div>
        <div class="admin_sub">
            <label for="name">Option 2</label>
            <input class="admin_input" type="text" name="option_2" placeholder="Option No 2" required>
        </div>
        <div class="admin_sub">
            <label for="name">Option 3</label>
            <input class="admin_input" type="text" name="option_3" placeholder="Option No 3" required>
        </div>
        <div class="admin_sub">
            <label for="name">Option 4</label>
            <input class="admin_input" type="text" name="option_4" placeholder="Option No 4" required>
        </div>
        <div class="admin_sub">
            <label for="name">Ans</label>
            <input class="admin_input" type="text" name="ans" placeholder="Answer" required>
        </div>

        <div id="btns">
            <button  type="submit" name="add_question" class="btn btn-primary">Add Question</button>
        </div>
    </form>
</div>

