<?php
include '../include/dp.php';
include './include/session.php'; 

 if(isset($_GET['data']))
 {
    $from = $_GET['from'];
    $from = mysqli_real_escape_string($connect,$from);
    $id = $_GET['data'];
    $id = mysqli_real_escape_string($connect,$id);
    switch($from)
    {

        case 'question':
            $query = "DELETE FROM questions WHERE id = '$id' ";
            $result = mysqli_query($connect, $query);
            header('Location: ./view_questions.php');
            break;
        case 'topic':
            $query = "DELETE FROM topic WHERE id = '$id' ";
            $result = mysqli_query($connect, $query);
            header('Location: ./topic.php');
            break;

        default:
            header('Location: ./admin_index.php');



    }

 }
 else
 {
    header('Location: ./admin_index.php');

 }


?>