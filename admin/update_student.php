<?php
include './include/session.php'; 
include "./include/head.php";
include "./include/navbar.php";

$message = "";
if (isset($_POST['update_student'])) {
    $id = $_POST['id'];
    $user_name = $_POST['student_name'];
    $user_email = $_POST['student_email'];
    $user_id = $_POST['student_id'];
    $password = $_POST['student_pasword'];
    $conf_password = $_POST['confirm_pasword'];
    if ($password == $conf_password) {
        $query = "UPDATE user SET user_name = '$user_name', user_email = '$user_email' , user_password = '$password', user_id = '$user_id' WHERE id = '$id' ";
        $result = mysqli_query($connect, $query);
        if ($result) {
            echo " <script> alert('Update In Successfull'); 
            window.location.href = './view_student.php';        
            </script>";
        } else {
            $messages = "Something Went Wrong Please Try After sometime";
            die($messages);
        }
    } else {
        $message = "Password dose not match ";
    }
}

?>


<div class="admin_main">
    <form action="" method="POST">
        <?php
        $value = $_GET["data"];

        $query = "SELECT * FROM user WHERE id = $value";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);
        ?>
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <div class="admin_sub">
            <label for="name">Student Name</label>
            <input type="text" name="student_name" value="<?php echo $row['user_name'] ?>">
        </div>
        <div class="admin_sub">
            <label for="name">Student Email</label>
            <input type="text" name="student_email" value="<?php echo $row['user_email'] ?>">
        </div>
        <div class="admin_sub">
            <label for="name">Student Id</label>
            <input type="text" name="student_id" value="<?php echo $row['user_id'] ?>">
        </div>
        <div class="admin_sub">
            <label for="name">Student Password</label>
            <input type="password" name="student_pasword" value="<?php echo $row['user_password'] ?>">
        </div>
        <div class="admin_sub">
            <label for="name">Confirm Password</label>
            <input type="text" name="confirm_pasword" value="<?php echo $row['user_password'] ?>">
        </div>
        <div id="btns">
            <button type="submit" name="update_student" class="btn btn-success">Update Student</button>
        </div>
        <div class="inside_div">
            <p style="color: red;"><?php echo $message; ?></p>
        </div>
    </form>
</div>



</html>