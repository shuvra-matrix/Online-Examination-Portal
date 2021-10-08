<?php
include "./include/logout.php"; 
include "./include/head.php";
include "./include/navbar.php";

if (isset($_POST['submit'])) 
{
    $user_ans  = $_POST['exampleRadios'];
    $user_ans = strings($user_ans);
    if ($_SESSION['question_array'][$_SESSION['next_question']][6] == $user_ans) 
    {
        $_SESSION['marks'] = $_SESSION['marks'] + 1;
    }
    unset($_SESSION['id_question']);
    unset($_SESSION['next_question']);
    unset($_SESSION['question_array']);
    unset($_SESSION['row_size']);
    $id = $_SESSION['id'];
    $topic_id = $_SESSION['question_id'];
    $name = $_SESSION['name'];
    $score = $_SESSION['marks'];
    $query = "INSERT INTO user_score (user_id,score,topic_id,date,name) VALUES ('$id','$score','$topic_id',now(),'$name')";
    $result = mysqli_query($connect, $query);
    if(!$result)
    {
        $ms = "Error 502!";
        die($ms );
    }
    unset($_SESSION['marks']);

    echo "<script> alert('Your answer subitted ');
        window.location.href = './student_index.php';
    </script>";
}


if (!isset($_SESSION['next_question'])) 
{
    $_SESSION['next_question'] = 0;
    $_SESSION['marks'] = 0;
}



if (isset($_POST['next_question'])) 
{


    $user_ans  = $_POST['exampleRadios'];
    $user_ans = strings($user_ans);
    if ($_SESSION['question_array'][$_SESSION['next_question']][6] == $user_ans) 
    {
        $_SESSION['marks'] = $_SESSION['marks'] + 1;
    }
    $_SESSION['next_question'] = $_SESSION['next_question'] + 1;
}



if (!isset($_POST['next_question'])) 
{
    $q_id = $_POST['id'];
    $_SESSION['question_id'] = $q_id; 
    $q_id = strings($q_id);
    $array = array();
    $query = "SELECT * FROM questions WHERE topic='$q_id'";
    $result = mysqli_query($connect, $query);
    $row_size = mysqli_num_rows($result);
    $_SESSION['row_size'] = $row_size;
    if ($row_size > 0) {
        while ($rows = mysqli_fetch_assoc($result)) 
        {

            array_push($array, array($rows['id'], $rows['question'], $rows['option1'], $rows['option2'], $rows['options3'], $rows['options4'], $rows['ans']));
        }

        $_SESSION['question_array'] = $array;
    } else {
        echo "<script> alert('Exam not start yet');
        window.location.href = './student_index.php';
    </script>";
    }
}


$question_id = $_SESSION['question_array'][$_SESSION['next_question']][0];
$question = $_SESSION['question_array'][$_SESSION['next_question']][1];
$option1 = $_SESSION['question_array'][$_SESSION['next_question']][2];
$option2 = $_SESSION['question_array'][$_SESSION['next_question']][3];
$option3 = $_SESSION['question_array'][$_SESSION['next_question']][4];
$option4 = $_SESSION['question_array'][$_SESSION['next_question']][5];
$ans = $_SESSION['question_array'][$_SESSION['next_question']][6];

?>

<div class="exam_main_div">
    <div>
        <h5><?php echo $question; ?></h5>
    </div>

    <div>
        <form action="" method="POST">
            <div class="exam_sub_div">
                <input class="radio_input" type="radio" name="exampleRadios" value="<?php echo $option1; ?>">
                <label class="radio_input_lable" for="exampleRadios2">
                    A. <?php echo $option1; ?>
                </label>

            </div>
            <div class="exam_sub_div">
                <input class="radio_input" type="radio" name="exampleRadios" value="<?php echo $option2; ?>" >
                <label class="radio_input_lable" for="exampleRadios2">
                    B. <?php echo $option2; ?>
                </label>
            </div>
            <div class="exam_sub_div">
                <input class="radio_input" type="radio" name="exampleRadios" value="<?php echo $option3; ?>" >
                <label class="radio_input_lable" for="exampleRadios2">
                    C. <?php echo $option3; ?>
                </label>
            </div>
            <div class="exam_sub_div">
                <input class="radio_input" type="radio" name="exampleRadios" value="<?php echo $option4; ?>" >
                <label class="radio_input_lable" for="exampleRadios2">
                    D. <?php echo $option4; ?>
                </label>
            </div>
            <input type="hidden" name="id_question" value="<?php echo $question_id; ?>">
            <?php if ($_SESSION['next_question'] < $_SESSION['row_size'] - 1) { ?>
                <div class="exam_sub_div">
                    <button class="exam_button btn btn-primary" type="submit" name="next_question">Next</button>
                </div><?php } else { ?>
                <div class="exam_sub_div">
                    <button class="exam_button btn btn-success" type="submit" name="submit">Submit</button>
                </div><?php } ?>

        </form>

    </div>
</div>

</html>