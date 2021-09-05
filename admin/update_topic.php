<?php
include './include/session.php'; 
include "./include/head.php";
include "./include/navbar.php";


if (isset($_GET['value'])) {
    $id = $_GET['value'];
    $query = "SELECT * FROM topic WHERE id = '$id'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
}

if(isset($_POST["update_topic"]))
{
    $id = $_POST['id'];
    $id = mysqli_real_escape_string($connect,$id);
    $topic_name = $_POST['topic_name'];
    $topic_name = mysqli_real_escape_string($connect,$topic_name);
    $query = "UPDATE topic SET topic_name = '$topic_name'  WHERE id = '$id'";
    $result = mysqli_query($connect,$query);
    if($result)
    {

        echo "<script> alert('Topic Updated'); 
            window.location.href = './topic.php'; 

        </script>";
    } else {
        $mesage = "Something went wrong";
        die($mesage);
    }
}





?>
<div class="admin_main">
    <form action="" method="POST">
        <div class="admin_sub">
            <label for="name">Topic Name</label>
            <input type="text" name="topic_name" value="<?php echo $row['topic_name'];   ?>">
            <input type="hidden" name="id" value="<?php echo $row['id'];   ?>">
        </div>
        <div id="btns">
            <button type="submit" name="update_topic" class="btn btn-primary">Update Topic</button>
        </div>
    </form>
</div>