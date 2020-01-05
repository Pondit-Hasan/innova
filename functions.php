<?php

// delete function
 function FunctionDelete($value1, $value2)
{
  require 'db_connect.php'; // database connect
  $delete_info = "DELETE FROM $value1 WHERE id='$value2'";
  $delete_reslt = mysqli_query($db_connect, $delete_info);
}

// restore data function
function restoreData($value1, $value2, $value3)
{
  $hostname = 'localhost';
  $host_user_id = 'root';
  $host_password = '';
  $db_name = $value1;
  // check database connection
  $db_connect = mysqli_connect($hostname, $host_user_id, $host_password, $db_name);
  mysqli_errno($db_connect);
// database query
  $slq = "SELECT * FROM $value2 WHERE id='$value3' ";
  $slq_rslt = mysqli_fetch_assoc(mysqli_query($db_connect, $slq));

  if ($slq_rslt['delete_status'] !=0) {
      $sql_update = "UPDATE $value2 SET delete_status=0 WHERE id='$value3' ";
      $sql_update_result = mysqli_query($db_connect, $sql_update);
      $_SESSION['restore_success'] = "Your selected data successfully restore!";
      header('location:trashbox.php');
  }
}

// delete data without imgage function
function deleteWithOutImage($value1, $value2, $value3)
{
  $hostname = 'localhost';
  $host_user_id = 'root';
  $host_password = '';
  $db_name = $value1;
  // check database connection
  $db_connect = mysqli_connect($hostname, $host_user_id, $host_password, $db_name);
  mysqli_errno($db_connect);
  // query to delete selected data
  $slq = "SELECT * FROM $value2 WHERE id='$value3' ";
  $slq_rslt = mysqli_fetch_assoc(mysqli_query($db_connect, $slq));

  if($slq_rslt['delete_status'] != 0) {
      //this will be execute when you want to delete data permanently
      $delete_info = "DELETE FROM $value2 WHERE id='$value3'";
      $delete_reslt = mysqli_query($db_connect, $delete_info);
      // redirect to trashbox page afer delete selected data with session
      $_SESSION['success_del'] = "Your selected information permanently delete!";
      header('location:trashbox.php');
  }else {
      //this will be execute when you want to delete data temporarily
      $soft_dlt = "UPDATE $value2 SET delete_status=1 WHERE id='$value3'";
      $soft_dlt_rslt = mysqli_query($db_connect, $soft_dlt);
      $_SESSION['success_del'] = "Your selected information successfully delete!";
      //header('location:$value2_info.php');
      header('location:' . $value2 . '_info.php');
  }


}


?>
