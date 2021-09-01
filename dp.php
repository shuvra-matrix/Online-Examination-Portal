<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['pass'] = '';
$db['database'] = 'exam';
foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}
$connect = mysqli_connect(DB_HOST, DB_USER, PASS, DATABASE);


?>