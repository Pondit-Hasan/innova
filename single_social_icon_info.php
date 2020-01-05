<?php
require 'dashboard_part/header.php';
require 'db_connect.php'; // database connect

$id = $_GET['id'];
if(!empty($_GET['id'])) {
    $single_user_info_select = "SELECT * FROM social_icons WHERE id=$id";
    $single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
    $afer_assoc = mysqli_fetch_assoc($single_select_reslt);
}

?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 col-sm-12 m-auto py-3 my-2">
      <div class="card bg-light mb-3">
        <div class="card-header text-center">
          <h3 class="bg_header py-3">Single Social Icon View!</h3>
        </div>
        <div class="card-body">
          <div class="bg-dark pt-2 pb-1 text-white text-center">
            <p class="mt-1"><a class="text-warning" href="edit_social_icon_info.php?id=<?php echo $afer_assoc['id'] ?>">Click here</a> to edit the information of the id#<?php echo $afer_assoc['id']; ?></p>
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
                <th>social_icon Title </th>
                <td> <?php echo $afer_assoc['social_icon_title']; ?> </td>
              </tr>
              <tr>
                <th> social_icon Description </th>
                <td> <?php echo $afer_assoc['social_icon_desp']; ?> </td>
              </tr>
              <tr>
                <th> social_icon Button </th>
                <td> <?php echo $afer_assoc['social_icon_btn'];  ?> </td>
              </tr>
              <tr>
                <th> social_icon Status </th>
                <td>
                  <?php
                  if($afer_assoc['social_icon_status']=="Active") {
                    echo "Active";
                  }else {
                    echo "Deactive";
                  }?>
                </td>

              </tr>
              <tr>
                <th> social_icon Image </th>
                <td> <img class="medium_img" src="uploads/social_icons/<?php echo $afer_assoc['social_icon_img']; ?>" alt="photo_<?php echo $afer_assoc['id']; ?>"> </td>
              </tr>

            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div><!-- row end  -->

  <!-- get the dashboard footer  -->
  <?php require 'dashboard_part/footer.php'; ?>
