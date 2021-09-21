
<?php
include './include/session.php'; 
include "./include/head.php";
include "./include/navbar.php";
$action = $_GET["action"];

switch($action)
{
    case "update_student":
        include "./include/update_student.php";
        break;
    case "add_student";
        include "./include/add_student.php";
        break;
    case "view_score";
        include "./include/view_score.php";
        break;
    case "delete_student":
        $student_id = $_GET['value'];
        $query = "DELETE FROM user WHERE id = '$student_id'";
        $result = mysqli_query($connect,$query);
    default:
        include "./include/view_student.php";
        break;
        
}

?>
</body>
</html>