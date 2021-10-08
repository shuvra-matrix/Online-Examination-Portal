<?php
session_start();
if(isset($_SESSION['id']))
{
    header("Location:./student_index.php");
}
include "./include/head.php";
?>

<?php
$message = "";
$data_password = "";
if (isset($_POST['login'])) 
{
    $user_id = $_POST['user_id'];
    $user_id = strings($user_id);
    $password = $_POST['password'];
    $password = strings($password);
    $query = "SELECT * FROM user WHERE user_id = '$user_id'";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $data_user_id = $row['user_id'];
        $data_user_name = $row['user_name'];
        $data_password = $row['user_password'];
    }
    if ($data_password == $password and $data_user_id == $user_id) {

        $_SESSION['id'] = $data_user_id;
        $_SESSION['name'] = $data_user_name;
        echo " <script> alert('Log In Successfull'); 
                        window.location.href = './student_index.php';
                </script>";
        } 
        elseif ($data_password != $password or $data_user_id != $user_id) 
        {
            $message = "Invalid Credintial! <br> <a style='color:#cd781f;' href='./change_password.php'>Forgot  password ?</a>  ";
        }
    }

?>


<div class="login_main_div">
    <div class="login_sub_div">
            <div class="login_div">
               <strong>Login</strong>
            </div>
            <div class="login_div">
               <p>Please enter your username and password!</p>
            </div>
        <form action="" method="POST">
            <div class="login_div">
                <input class="log_input" id="email" type="text" name="user_id" placeholder="Username" required>
            </div>
            <div class="login_div">
                <input class="log_input" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="login_div">
                <button class="btn btn-primary" value="login" name="login">Log In </button>
            </div>
            <div class="login_div">
                <p style="color: #ad3b6d;"><?php echo $message; ?></p>
            </div>
        </form>
    </div>
</div>
</body>

</html>