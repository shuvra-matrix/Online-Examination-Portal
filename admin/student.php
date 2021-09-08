<?php
$action = $_GET["action"];

switch($action)
{
    case "update_student":
        $student_id = $_GET['value'];
        header("Location: ./update_student.php?data=$student_id");
        break;
    case "delete_student":
        $student_id = $_GET['value'];
        $query = "DELETE FROM user WHERE id = '$student_id'";
        $result = mysqli_query($connect,$query);
        header("Location: ./view_student.php");
        break;
    default:
        header("Location: ./view_student.php");
        break;
        
}

?>