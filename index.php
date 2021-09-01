<?php 

include './dp.php'; 


if(isset($_POST['login']))
{   
    $user_type = $_POST['user_type'];
    if($user_type == "student")
    {   
        $user_id = $_POST['user_id'];
        $user_id = mysqli_real_escape_string($connect,$user_id);
        $password = $_POST['password'];
        $password = mysqli_real_escape_string($connect,$password);
        $query = "SELECT * FROM user WHERE user_id = '$user_id'";
        $result = mysqli_query($connect,$query);
        while($row = mysqli_fetch_assoc($result))
        {
            $data_user_id = $row['user_id'];
            $data_user_name = $row['user_name'];
            $data_password = $row['user_password'];
            if ($data_password == $password and $data_user_id == $user_id)
            {
                echo "Log iN";
                echo $data_user_name;
            }
            else
            {
                echo "invalid password";
            }
        }

    }
    elseif ($user_type == "admin") 
    {
        $admin_id = $_POST['user_id'];
        $admin_id = mysqli_real_escape_string($connect, $user_id);
        $password = $_POST['password'];
        $password = mysqli_real_escape_string($connect, $password);
        $query = "SELECT * FROM admin WHERE admin_id = '$admin_userid'";
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $data_admin_id = $row['admin_userid'];
            $data_password = $row['admin_password'];
            if ($data_password == $password and $data_user_id == $user_id) 
            {
                echo "Log iN";
                echo $data_user_name;
            } 
            
            else 
            {
                echo "invalid password";
            }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Exam Portal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>
    <div class="main_div">
        <form action="" method="POST">
            <div class="inside_div">
                <label for="email">User Id</label>
                <input id="email" type="text" name="user_id"  placeholder="Your User Id">
            </div>
            <div class="inside_div">
                <label for="password">Password</label>
                <input type="password" name="password"  placeholder="Password">
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
        </form>
    </div>
</body>

</html>