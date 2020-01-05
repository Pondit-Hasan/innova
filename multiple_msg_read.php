<?php
session_start();
require 'db_connect.php';

 if (!empty($_POST)) {
   $selectedIds = $_POST['selectedId'];
   $after_implode = implode(',', $selectedIds);
   // query to delete selected data
   $delete_info = "UPDATE messages SET status=1 WHERE id IN ($after_implode)";
   $delete_reslt = mysqli_query($db_connect, $delete_info);
   // redirect to users_info page afer delete selected data with session
   $_SESSION['success_del'] = "Your selected information successfully read!";
   header('location:messages_info.php');
 }else {
   header('location:messages_info.php');
 }


?>
