<?php 
include "./include/head.php";
include "./include/navbar.php";
?>


<?php
$message = "";
if (isset($_POST['login'])) {
    $user_type = $_POST['user_type'];
    if ($user_type == "student") {
        $user_id = $_POST['user_id'];
        $user_id = mysqli_real_escape_string($connect, $user_id);
        $password = $_POST['password'];
        $password = mysqli_real_escape_string($connect, $password);
        $query = "SELECT * FROM user";
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $data_user_id = $row['user_id'];
            $data_user_name = $row['user_name'];
            $data_password = $row['user_password'];
            if ($data_password == $password and $data_user_id == $user_id) {
                echo " <script> alert('Log In Successfull'); </script>";
                
            } elseif ($data_password != $password or $data_user_id != $user_id) 
            {
                $message = "Invalid Credintial! if you forgot your password please contact your  admin  ";
            }
        }
    }
    if ($user_type == "admin") 
    {
        $admin_id = $_POST['user_id'];
        $admin_id = mysqli_real_escape_string($connect, $admin_id);
        $password = $_POST['password'];
        $password = mysqli_real_escape_string($connect, $password);
        $query = "SELECT * FROM admin" ;
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $data_admin_id = $row['admin_userid'];
            $data_password = $row['admin_password'];
            if ($data_password == $password and $data_admin_id == $admin_id) 
            {   
                header("Location: ./admin/admin_index.php");
            } 
            elseif ($data_password != $password or $data_admin_id != $admin_id) {
                $message = "Invalid Credintial! if you forgot your password please contact your  admin  ";
            }
        }
    }
}
?>




<div class="main_div">
    <form action="" method="POST">
        <div class="inside_div">
            <label for="email">User Id</label>
            <input id="email" type="text" name="user_id" placeholder="Your User Id">
        </div>
        <div class="inside_div">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div class="inside_div">
            <label for="options">User Type</label>
            <select name="user_type" id="">
                <option value="">Select User</option>
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select>

        </div>
        <div class="inside_div">
            <button class="btn btn-primary" value="login" name="login">Log In </button>
        </div>
        <div class="inside_div">
            <p style="color: red;"><?php echo $message; ?></p>
        </div>
    </form>
</div>
</body>

</html>