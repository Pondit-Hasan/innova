<?php
require 'dashboard_part/header.php';
require 'db_connect.php'; // database connect

$id = $_GET['id'];
if(!empty($_GET['id'])) {
    $single_user_info_select = "SELECT * FROM messages WHERE id=$id";
    $single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
    $afer_assoc = mysqli_fetch_assoc($single_select_reslt);
    if ($afer_assoc['status']==0) {
      $sql = "UPDATE messages SET status=1 WHERE id= '$id' ";
      $sql_result = mysqli_query($db_connect, $sql);
    }
}


?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 col-sm-12 m-auto py-3 my-2">
      <div class="card bg-light mb-3">
        <div class="card-header text-center">
          <h3 class="bg_header py-3">Single Message View!</h3>
        </div>
        <div class="card-body">
          <div class="bg-dark pt-2 pb-1 text-white text-center">
            <p class="mt-1"><?php echo $afer_assoc['name']; ?>'s Message!</p>
          </div>
          <table class="table card-text table-bordered">
            <thead>
              <tr>
                <th>Items</th>
                <td>Information</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>ID</th>
                <td> <?php echo $afer_assoc['id']; ?> </td>
              </tr>
              <tr>
                <th>NAME </th>
                <td> <?php echo $afer_assoc['name']; ?> </td>
              </tr>
              <tr>
                <th> EMAIL </th>
                <td> <?php echo $afer_assoc['email']; ?> </td>
              </tr>
              <tr>
                <th> Send Time </th>
                <td> <?php echo $afer_assoc['send_time']; ?> </td>
              </tr>
              <tr>
                <th> MESSAGE </th>
                <td> <?php echo $afer_assoc['message'];  ?> </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div><!-- row end  -->

  <!-- get the dashboard footer  -->
  <?php require 'dashboard_part/footer.php'; ?>
