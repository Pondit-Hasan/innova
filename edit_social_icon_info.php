<?php
require 'dashboard_part/header.php';
require 'db_connect.php';

$id = $_GET['id'];
$single_user_info_select = "SELECT * FROM social_icons WHERE id=$id";
$single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
$afer_assoc = mysqli_fetch_assoc($single_select_reslt);
?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 col-sm-12 m-auto py-3 my-2">
      <div class="bg-success text-white">
        <h2 class="text-center py-3 bg_header">Welcome to Edit Social Icon Page!</h2>
          <?php if(!empty($_GET['success_msg'])) { ?>
            <h3 class="text-center py-3">
            <?php echo $_GET['success_msg']; ?>
          </h3>
          <?php } ?>
      </div>
      <!-- update form -->
      <form action="update_social_icon.php" method="post" class="px-3 border border-info bg-light text-dark" enctype="multipart/form-data" >
        <div class="form-group my-3">
          <input type="hidden" name="id" class="form-control" value="<?php echo $afer_assoc['id']; ?>">
        </div>
        <div class="form-group my-3 row">
          <label class="col-sm-2 col-form-label" for="social_icon_name">Social Icon Name</label>
          <div class="col-sm-10">
            <input type="text" id="social_icon_name" name="social_icon_name" class="form-control" value="<?php echo $afer_assoc['social_icon_name']; ?>">
          </div>
        </div>
        <div class="form-group my-3 row">
          <label class="col-sm-2 col-form-label" for="social_icon_link">Social Icon Link</label>
          <div class="col-sm-10">
            <input type="text" id="social_icon_link" name="social_icon_link" class="form-control" value="<?php echo $afer_assoc['social_icon_link']; ?>">
          </div>
        </div>
        <div class="form-group my-3 row">
          <label for="role" class="col-sm-2 col-form-label">Social Icon</label>
          <div class="col-sm-10">
            <select id="role" class="form-control" name="social_icon">
              <option value="">Select Social Icon</option>
              <option value="facebook" <?= ($afer_assoc['social_icon']=="facebook") ? 'selected' : ''; ?>>Facebook</option>
              <option value="twitter" <?= ($afer_assoc['social_icon']=="twitter") ? 'selected' : ''; ?>>Twitter</option>
              <option value="google-plus" <?= ($afer_assoc['social_icon']=="google-plus") ? 'selected' : ''; ?>>Google Plus</option>
              <option value="youtube" <?= ($afer_assoc['social_icon']=="youtube") ? 'selected' : ''; ?>>Youtube</option>
            </select>
          </div>
        </div>
        <div class="form-group pt-2 text-center my-3">
          <a  class="btn btn-warning text-white" href="social_icons_info.php">Don't Update</a>
          <!-- <button type="submit" class="btn btn-info">Update</button> -->
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal_<?php echo $afer_assoc['id']; ?>">Update</button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal_<?php echo $afer_assoc['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-name" id="exampleModalLabel">Are you sure you want to change your information?</h5>
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
