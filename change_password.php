<?php
session_start();
include "./include/head.php";
$message = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["login"]))
{
    $email = $_POST['user_id'];
    $email = strings($email);
    $query = "SELECT * FROM user WHERE user_email = '$email' ";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_assoc($result);
    $rows_count = mysqli_num_rows($result);
    if($rows_count == 0)
    {
        $message = "Email Id Not Found !";
    }
    else
    {   
        $_SESSION['user_email'] = $email;
        $name = $row['user_name'];
        $otp = rand(134578,985678);
        $_SESSION['code'] = $otp ;
        require './mailer/Exception.php';
        require './mailer/SMTP.php';
        require './mailer/PHPMailer.php';

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();                                          
            $mail->Host       = 'smtp.gmail.com';                   
            $mail->SMTPAuth   = true;                                 
            $mail->Username   = 'shuvratcp@gmail.com';                   
            $mail->Password   = 'iamacool';                             
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;                                    

        
            $mail->setFrom('shuvratcp@gmail.com', 'Exam Controler');
            $mail->addAddress($email, $name);    
        


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Exam Portal - '. $otp .' is your OTP ';
            $mail->Body    = '<div style="background:palegreen;padding:2rem" >Hi, <br><br> We are sharing the verification code to you ,so you can access your account. <br><br> Once you have verified the code , you will be prompted to set a new password to access your account <br><br> Your OTP: '. $otp .' <br><br> Best Regards, <br><br> Team Exam Portal <div>';

            $mail->send();
            $_SESSION['otp'] = 'otp';
            echo " <script> alert('Check You Email For OTP'); 
                        window.location.href = './verification.php';
                </script>";
        } catch (Exception $e) 
        {
            $message = 'Something Went Wrong! Please Try After Some Time';

        }
    }
}
?>

<div class="login_main_div">
    <div class="login_sub_div">
            <div class="login_div">
               <strong>Forgot Password</strong>
            </div>
            <div class="login_div">
               <p>Enter Your Email!</p>
            </div>
        <form action="" method="POST">
            <div class="login_div">
                <input class="log_input" id="email" type="email" name="user_id" placeholder="Your Email" required>
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