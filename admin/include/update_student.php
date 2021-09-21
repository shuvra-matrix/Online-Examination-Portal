<?php


$message = "";
if (isset($_POST['update_student'])) {
    $id = $_POST['id'];
    $id = strings($id);
    $user_name = $_POST['student_name'];
    $user_name = strings($user_name);
    $user_email = $_POST['student_email'];
    $user_email = strings($user_email);
    $user_id = $_POST['student_id'];
    $user_id = strings($user_id);
    $password = $_POST['student_pasword'];
    $password = strings($password);
    $conf_password = $_POST['confirm_pasword'];
    $conf_password = strings($conf_password);
    if ($password == $conf_password) {
        $query = "UPDATE user SET user_name = '$user_name', user_email = '$user_email' , user_password = '$password', user_id = '$user_id' WHERE id = '$id' ";
        $result = mysqli_query($connect, $query);
        if ($result) {
            echo " <script> alert('Update In Successfull'); 
            window.location.href = './student.php?action=#';        
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
        $value = $_GET["value"];
        $value = strings($value);

        $query = "SELECT * FROM user WHERE id = $value";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);
        ?>
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <div class="admin_sub">
            <label for="name">Student Name</label>
            <input type="text" name="student_name" value="<?php echo $row['user_name'] ?>" placeholder="Student Full Name" required>
        </div>
        <div class="admin_sub">
            <label for="name">Student Email</label>
            <input type="text" name="student_email" value="<?php echo $row['user_email'] ?>"  placeholder="Student Email" required>
        </div>
        <div class="admin_sub">
            <label for="name">Student Id</label>
            <input type="text" name="student_id" value="<?php echo $row['user_id'] ?>" placeholder="Student Id" required>
        </div>
        <div class="admin_sub">
            <label for="name">Student Password</label>
            <input type="password" name="student_pasword" value="<?php echo $row['user_password'] ?>" placeholder="Password" required>
        </div>
        <div class="admin_sub">
            <label for="name">Confirm Password</label>
            <input type="text" name="confirm_pasword" value="<?php echo $row['user_password'] ?>" placeholder="Confirm Password" required>
        </div>
        <div id="btns">
            <button type="submit" name="update_student" class="btn btn-success">Update Student</button>
        </div>
        <div class="inside_div">
            <p style="color: red;"><?php echo $message; ?></p>
        </div>
    </form>
</div>


