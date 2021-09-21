<?php
include './include/session.php'; 
include "./include/head.php";
include "./include/navbar.php";
$action = $_GET["action"];

switch($action)
{
    case "update_question":
        include "./include/update_questions.php";
        break;
    case "add_question";
        include "./include/add_questions.php";
        break;
    case "delete_question":
        $id = $_GET['data'];
        $id = mysqli_real_escape_string($connect,$id);
        $query = "DELETE FROM questions WHERE id = '$id' ";
        $result = mysqli_query($connect, $query);
    default:
        include "./include/view_questions.php";
        break;
        
}

?>