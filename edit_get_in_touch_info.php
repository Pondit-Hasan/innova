<?php
require 'dashboard_part/header.php';
require 'db_connect.php';

$id = $_GET['id'];
$single_user_info_select = "SELECT * FROM get_in_touch WHERE id=$id";
$single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
$afer_assoc = mysqli_fetch_assoc($single_select_reslt);
?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 col-sm-12 m-auto py-3 my-2">
      <div class="bg-success text-white">
        <h2 class="text-center py-3 bg_header">Welcome to Get In Touch Page!</h2>
          <?php if(!empty($_GET['success_msg'])) { ?>
            <h3 class="text-center py-3">
            <?php echo $_GET['success_msg']; ?>
          </h3>
          <?php } ?>
      </div>
      <!-- error msg if password to confirm is empty -->
      <?php if(isset($_SESSION['ConfrmPass_empty'])){ ?>
        <div class="alert alert-warning" role="alert">
          <?php echo $_SESSION['ConfrmPass_empty']; ?>
        </div>
      <?php } unset($_SESSION['ConfrmPass_empty']); ?>
      <!-- error msg if password to confirm is empty -->
      <?php if(isset($_SESSION['ConfrmPass_err'])){ ?>
        <div class="alert alert-warning" role="alert">
          <?php echo $_SESSION['ConfrmPass_err']; ?>
        </div>
      <?php } unset($_SESSION['ConfrmPass_err']); ?>
      <!-- update form -->
      <form action="update_get_in_touch.php" method="post" class="px-3 border border-info bg-light text-dark" enctype="multipart/form-data" >
        <div class="form-group my-3">
          <input type="hidden" name="id" class="form-control" value="<?php echo $afer_assoc['id']; ?>">
        </div>
        <div class="form-group my-3 row">
          <label class="col-sm-2 col-form-label" for="get_in_touch_title">get_in_touch Title</label>
          <div class="col-sm-10">
            <input type="text" id="get_in_touch_title" name="get_in_touch_title" class="form-control" value="<?php echo $afer_assoc['get_in_touch_title']; ?>">
          </div>
        </div>
        <div class="form-group my-3 row">
          <label class="col-sm-2 col-form-label" for="get_in_touch_desp">get_in_touch Description</label>
          <div class="col-sm-10">
            <textarea id="get_in_touch_desp" type="text" name="get_in_touch_desp" class="form-control" rows="5"><?php echo $afer_assoc['get_in_touch_desp']; ?></textarea>
          </div>
        </div>
        <div class="form-group my-3 row">
          <label class="col-sm-2 col-form-label" for="gender">get_in_touch Button</label>
          <div class="col-sm-10">
            <input type="text" name="get_in_touch_btn" class="form-control" value="<?php echo $afer_assoc['get_in_touch_btn']; ?>">
          </div>
        </div>
        <div class="form-group my-3 row">
          <label for="role" class="col-sm-2 col-form-label">get_in_touch Status</label>
          <div class="col-sm-10">
            <select id="role" class="form-control" name="get_in_touch_status">
              <option value=0>Select get_in_touch Status</option>
              <option value=1 <?= ($afer_assoc['get_in_touch_status']==1) ? 'selected' : ''; ?>>Active</option>
              <option value=2 <?= ($afer_assoc['get_in_touch_status']==2) ? 'selected' : ''; ?>>Deactive</option>
            </select>
          </div>
        </div>
        <div class="form-group pt-2 text-center my-3">
          <a  class="btn btn-warning text-white" href="get_in_touch_info.php">Don't Update</a>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal_<?php echo $afer_assoc['id']; ?>">Update</button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal_<?php echo $afer_assoc['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to change your information?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <button type="submit" class="btn btn-info">Yes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>

  <!-- get the dashboard footer  -->
  <?php require 'dashboard_part/footer.php'; ?>
