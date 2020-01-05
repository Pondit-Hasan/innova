
<?php

session_start();
require 'db_connect.php';
require 'functions.php';

echo $id = $_GET['id'];





die():
restoreData('falcon', 'banners', $id);
$msg_query_info = "SELECT * FROM messages ";
$msg_query_info_rslt = mysqli_query($db_connect, $msg_query_info);

$arr = array();


foreach ($msg_query_info_rslt as $value) {
    echo  $value['send_time'];
    echo "<br>";

}
echo  $value['send_time'];
$b = $value['send_time']; $a = explode(',', $b);

echo $a[0];

?>
