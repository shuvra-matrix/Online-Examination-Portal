<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['pass'] = '';
$db['database'] = 'exam';




// $db['db_host'] = 'db4free.net';
// $db['db_user'] = 'shuvramatrix';
// $db['pass'] = 'iamacool';
// $db['database'] = 'ionexamdb';


foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}


$connect = mysqli_connect(DB_HOST, DB_USER, PASS, DATABASE);


?>