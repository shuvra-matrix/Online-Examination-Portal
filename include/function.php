<?php

function strings($s)
{   
    global $connect;
    $str = mysqli_real_escape_string($connect , $s);
    return $str;
}


?>