<?php
$message = "";
if (isset($_POST["add_student"])) {
    $student_name = $_POST["student_name"];
    $student_name = strings($student_name);
    $student_email = $_POST["student_email"];
    $student_email = strings($student_email);
    $student_ID = $_POST["student_id"];
    $student_ID = strings($student_ID);
    $student_password = $_POST["student_pasword"];
    $student_password = strings($student_password);
    $confirm_pasword = $_POST["confirm_pasword"];
    $confirm_pasword = strings($confirm_pasword);

    $query = "SELECT * FROM user WHERE user_id = '$student_ID'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_num_rows($result);
    if ($row == 0) {


        if ($student_password == $confirm_pasword) {
            $query = "INSERT INTO user(user_name,user_email,user_id,user_password) VALUES ('$student_name','$student_email','$student_ID','$student_password') ";
            $result = mysqli_query($connect, $query);
            if (!$result) {
                die();
                echo "<script>
                    alert('Something went wrong');
                </script>";
            } else {
                echo "<script>
                    alert('Student add successfully');
                </script>";
            }
        } else {
            $message = "password does not match";
        }
    } else {
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
            <input class="admin_input" type="text" name="student_name" placeholder="Student Full Name" required>
        </div>
        <div class="admin_sub">
            <label for="name">Student Email</label>
            <input class="admin_input" type="text" name="student_email" placeholder="Student Email" required>
        </div>
        <div class="admin_sub">
            <label for="name">Student Id</label>
            <input class="admin_input" type="text" name="student_id" placeholder="Student Id" required>
        </div>
        <div class="admin_sub">
            <label for="name">Student Password</label>
            <input class="admin_input" type="text" name="student_pasword" placeholder="Password" required>
        </div>
        <div class="admin_sub">
            <label for="name">Confirm Password</label>
            <input class="admin_input" type="text" name="confirm_pasword" placeholder="Confirm Password" required>
        </div>
        <div id="btns">
            <button type="submit" name="add_student" class="btn btn-primary">Add Student</button>
        </div>
        <div class="admin_sub">
            <p><?php echo $message;  ?></p>
        </div>
    </form>
</div>
