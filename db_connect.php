<?php

$hostname = 'localhost';
$host_user_id = 'root';
$host_password = '';
$db_name = 'falcon';
// check database connection
$db_connect = mysqli_connect($hostname, $host_user_id, $host_password, $db_name);

mysqli_errno($db_connect);

?>