<?php
include "./include/head.php";
if(isset($_SESSION['user']))
{
    header("Location:./admin_index.php");
}
?>


<?php
$message = "";
if (isset($_POST['login'])) {
    $admin_id = $_POST['user_id'];
    $admin_id = mysqli_real_escape_string($connect, $admin_id);
    $password = $_POST['password'];
    $password = mysqli_real_escape_string($connect, $password);
    $query = "SELECT * FROM admin WHERE admin_userid = '$admin_id'";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $data_admin_id = $row['admin_userid'];
        $data_password = $row['admin_password'];
    }
        if ($data_password == $password and $data_admin_id == $admin_id) 
        {
            session_start();
            $_SESSION['user'] = 'admin_admin';
            header("Location: ./admin_index.php");
        } elseif ($data_password != $password or $data_admin_id != $admin_id) 
        {
            $message = "Invalid Credintial! ";
        }
    
}
?>




<div class="login_main_div">
    <div class="login_sub_div">
            <div class="login_div">
               <strong>Admin Login</strong>
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