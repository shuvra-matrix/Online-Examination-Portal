<?php 
    
    session_start();
    if(!isset($_SESSION['user']))
    {
      header("Location: ./index.php");   
    }
    elseif(isset($_GET['action']))
    {
          session_start();
          session_destroy();
          header("Location: ../index.php");   
 
     

    }

     






?>