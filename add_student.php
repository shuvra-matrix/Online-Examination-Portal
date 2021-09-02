<?php

include './dp.php';
include "./include/head.php";
include "./include/navbar.php";
$message = "";
if (isset($_POST["add_student"])) {
    $student_name = $_POST["student_name"];
    $student_email = $_POST["student_email"];
    $student_ID = $_POST["student_id"];
    $student_password = $_POST["student_pasword"];
    $confirm_pasword = $_POST["confirm_pasword"];

    $query = "SELECT * FROM user WHERE user_id = '$student_ID'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_num_rows($result);
    if ($row == 0 )
    {


        if ($student_password == $confirm_pasword) {
            $query = "INSERT INTO user(user_name,user_email,user_id,user_password) VALUES ('$student_name','$student_email','$student_ID','$student_password') ";
            $result = mysqli_query($connect, $query);
            if (!$result) {
                die();
                echo "<script>
                    alert('Something went wrong');
                </script>";
            }
            else
            {
                echo "<script>
                    alert('Student add successfully');
                </script>";   
            }
        } else {
            $message = "password does not match";
        }
    }
    else
    {
        echo "<script>
                    alert('Student alredy present');
                </script>";  
    }
}


?>

<div class="admin_main">
    <form action="" method="POST">
        <div class="admin_sub">
            <label for="name">Student Name</label>
            <input type="text" name="student_name">
        </div>
        <div class="admin_sub">
            <label for="name">Student Email</label>
            <input type="text" name="student_email">
        </div>
        <div class="admin_sub">
            <label for="name">Student Id</label>
            <input type="text" name="student_id">
        </div>
        <div class="admin_sub">
            <label for="name">Student Password</label>
            <input type="text" name="student_pasword">
        </div>
        <div class="admin_sub">
            <label for="name">Confirm Password</label>
            <input type="text" name="confirm_pasword">
        </div>
        <div id="btns">
            <button type="submit" name="add_student" class="btn btn-primary">Add Student</button>
        </div>
        <div class="admin_sub">
            <p><?php echo $message;  ?></p>
        </div>
    </form>
</div>



</html>