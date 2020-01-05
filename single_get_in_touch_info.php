<?php
require 'dashboard_part/header.php';
require 'db_connect.php'; // database connect

$id = $_GET['id'];
if(!empty($_GET['id'])) {
    $single_user_info_select = "SELECT * FROM get_in_touch WHERE id=$id";
    $single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
    $afer_assoc = mysqli_fetch_assoc($single_select_reslt);
}

?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 col-sm-12 m-auto py-3 my-2">
      <div class="card bg-light mb-3">
        <div class="card-header text-center">
          <h3 class="bg_header py-3">Single get_in_touch View!</h3>
        </div>
        <div class="card-body">
          <div class="bg-dark pt-2 pb-1 text-white text-center">
            <p class="mt-1"><a class="text-warning" href="edit_get_in_touch_info.php?id=<?php echo $afer_assoc['id'] ?>">Click here</a> to edit the information of the id#<?php echo $afer_assoc['id']; ?></p>
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
                <th>get_in_touch Title </th>
                <td> <?php echo $afer_assoc['get_in_touch_title']; ?> </td>
              </tr>
              <tr>
                <th> get_in_touch Description </th>
                <td> <?php echo $afer_assoc['get_in_touch_desp']; ?> </td>
              </tr>
              <tr>
                <th> get_in_touch Button </th>
                <td> <?php echo $afer_assoc['get_in_touch_btn'];  ?> </td>
              </tr>
              <tr>
                <th> get_in_touch Status </th>
                <td>
                  <?php
                  if($afer_assoc['get_in_touch_status']==1) {
                    echo "Active";
                  }else {
                    echo "Deactive";
                  }?>
                </td>

              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div><!-- row end  -->

  <!-- get the dashboard footer  -->
  <?php require 'dashboard_part/footer.php'; ?>
