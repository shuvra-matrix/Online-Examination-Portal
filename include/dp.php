<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['pass'] = '';
$db['database'] = 'exam';




// $db['db_host'] = 'sql306.epizy.com';
// $db['db_user'] = 'epiz_28817989';
// $db['pass'] = 'VFO5G7V5hPPn';
// $db['database'] = 'epiz_28817989_exam';


foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}


$connect = mysqli_connect(DB_HOST, DB_USER, PASS, DATABASE);


?>