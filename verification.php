<?php
session_start();
include "./include/head.php";
$message = "";

if(!isset($_SESSION['otp']))
{
    header("Location:./index.php");
}

if(isset($_POST["login"]))
{
   $user_otp = $_POST['otp'];
   $user_otp = strings($user_otp);
   $otp = $_SESSION['code'];
   if($user_otp == $otp)
   {    
        $_SESSION['otp'] = null;
        $_SESSION['code'] = null;
        $_SESSION['new_pass'] = 'new_pass';
        header("Location:./new_password.php");
        
   }
   else
   {
       $message = "Invalid OTP! ";
   }
}
?>

<div class="login_main_div">
    <div class="login_sub_div">
            <div class="login_div">
               <strong>User Verifiaion</strong>
            </div>
            <div class="login_div">
               <p>Enter Your OTP!</p>
            </div>
        <form action="" method="POST">
            <div class="login_div">
                <input class="log_input" id="email" type="text" name="otp" placeholder="Enter Your Code" required>
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