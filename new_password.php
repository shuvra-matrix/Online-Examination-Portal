<?php
session_start();
include "./include/head.php";
$message = "";

if(!isset($_SESSION['new_pass']))
{
    header("Location:./index.php");
}

if(isset($_POST["login"]))
{
   $password = $_POST['password'];
   $user_otp = strings($password);
   $con_password = $_POST['conf_password'];
   $con_password = strings($con_password);
   if($con_password === $password)
   {
        $email = $_SESSION['user_email'];
        $query = "UPDATE user SET user_password='$password' WHERE user_email = '$email'";
        $result = mysqli_query($connect,$query);
        session_destroy();
        echo " <script> alert('New Password Set! Please Login'); 
                        window.location.href = './index.php';
                </script>";
 
   }
   else
   {
       $message = "Password Not Matched! ";
   }
}
?>

<div class="login_main_div">
    <div class="login_sub_div">
            <div class="login_div">
               <strong>New Password</strong>
            </div>
            <div class="login_div">
               <p>Enter New Password!</p>
            </div>
        <form action="" method="POST">
            <div class="login_div">
                <input class="log_input" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="login_div">
                <input class="log_input" type="text" name="conf_password" placeholder="Confirm Password" required>
            </div>
            <div class="login_div">
                <button class="btn btn-primary" value="login" name="login">Submit </button>
            </div>
            <div class="login_div">
                <p style="color: #ad3b6d;"><?php echo $message; ?></p>
            </div>
        </form>
    </div>
</div>
</body>

</html>