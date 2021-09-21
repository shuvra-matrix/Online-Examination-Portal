<?php
include './include/session.php'; 
include "./include/head.php";
include "./include/navbar.php";
$action = $_GET["action"];

switch($action)
{
    case "update_topic":
        include "./include/update_topic.php";
        break;
    case "delete_topic":
        $id = $_GET['data'];
        $id = mysqli_real_escape_string($connect,$id);
        $query = "DELETE FROM topic WHERE id = '$id' ";
        $result = mysqli_query($connect, $query);
    default:
        include "./include/view_topic.php";
        break;
        
}

?>
</body>
</html>