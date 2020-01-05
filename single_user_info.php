<?php
require 'dashboard_part/header.php';
require 'db_connect.php'; // database connect

$id = $_GET['id'];
if(!empty($_GET['id'])) {
    $single_user_info_select = "SELECT * FROM users WHERE id=$id";
    $single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
    $afer_assoc = mysqli_fetch_assoc($single_select_reslt);
}

?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 col-sm-12 m-auto py-3 my-2">
      <div class="card bg-light mb-3">
        <div class="card-header text-center">
          <h3 class="bg_header py-3">Individual user's information here!</h3>
        </div>
        <div class="card-body">
          <?php if ($_SESSION['log_role']==1 OR $_SESSION['log_role']==2): ?>
            <div class="bg-dark pt-2 pb-1 text-white text-center">
              <p class="mt-1"><a class="text-warning" href="edit_user_info.php?id=<?php echo $afer_assoc['id'] ?>">Click here</a> to edit <?php echo $afer_assoc['name']; ?>'s info!</p>
            </div>
          <?php endif; ?>
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
                <th> AGE </th>
                <td> <?php echo $afer_assoc['age'];  ?> </td>
              </tr>
              <tr>
                <th> GENDER </th>
                <td> <?php echo $afer_assoc['gender']; ?> </td>
              </tr>
              <tr>
                <th> ROLE </th>
                <td>
                  <?php
                  if($afer_assoc['role']==1) {
                    echo "Admin";
                  }
                  else if($afer_assoc['role']==2) {
                    echo "Modarator";
                  }
                  else {
                    echo "Editor";
                  }?>
                </td>

              </tr>
              <tr>
                <th> Photo </th>
                <td> <img class="medium_img" src="uploads/users/<?php echo $afer_assoc['photo']; ?>" alt="photo_<?php echo $afer_assoc['id']; ?>"> </td>
              </tr>

            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div><!-- row end  -->

  <!-- get the dashboard footer  -->
  <?php require 'dashboard_part/footer.php'; ?>
