<?php
require 'dashboard_part/header.php';
require 'db_connect.php';

$id = $_GET['id'];
$single_user_info_select = "SELECT * FROM users WHERE id=$id";
$single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
$afer_assoc = mysqli_fetch_assoc($single_select_reslt);


?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 col-sm-12 m-auto py-3 my-2">
      <div class="bg-success text-white">
        <h2 class="text-center py-3 bg_header">Welcome to Edit Page!</h2>
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
      <form action="update_info.php" method="post" class="px-3 border border-info bg-light text-dark" enctype="multipart/form-data" >
        <div class="form-group my-3">
          <input type="hidden" name="id" class="form-control" value="<?php echo $afer_assoc['id']; ?>">
        </div>
        <div class="form-group my-3 row">
          <label class="col-sm-2 col-form-label" for="name">Name:</label>
          <div class="col-sm-10">
            <input type="text" id="name" name="fnane" class="form-control" value="<?php echo $afer_assoc['name']; ?>">
          </div>
        </div>
        <div class="form-group my-3">
          <input id="email" type="hidden" name="email" class="form-control" value="<?php echo $afer_assoc['email']; ?>">
        </div>
        <div class="form-group my-3 row">
          <label class="col-sm-2 col-form-label" for="age">Age:</label>
          <div class="col-sm-10">
            <input id="age" type="number" name="age" class="form-control" value="<?php echo $afer_assoc['age']; ?>">
          </div>
        </div>
        <div class="form-group my-3 row">
          <label class="col-sm-2 col-form-label" for="gender">Gender:</label>
          <div class="col-sm-10">
            <select id="gender" class="form-control" name="gender">
              <option value="">Select your gender</option>
              <option value="male" <?= ($afer_assoc['gender']=='male') ? 'selected' : ''; ?> >male</option>
              <option value="female" <?= ($afer_assoc['gender']=='female') ? 'selected' : ''; ?>>Female</option>
            </select>
          </div>
        </div>
        <?php if ($_SESSION['log_role']==1): ?> <!-- this will show if only admin log in -->
        <div class="form-group my-3 row">
          <label for="role" class="col-sm-2 col-form-label">Role:</label>
          <div class="col-sm-10">
            <select id="role" class="form-control" name="role">
              <option value="">Select your role</option>
              <option value="1" <?= ($afer_assoc['role']==1) ? 'selected' : ''; ?>>Admin</option>
              <option value="2" <?= ($afer_assoc['role']==2) ? 'selected' : ''; ?>>Modarator</option>
              <option value="3" <?= ($afer_assoc['role']==3) ? 'selected' : ''; ?>>Editor</option>
            </select>
          </div>
        </div>
      <?php endif; ?>
        <div class="custom-file">
          <input name="photo" type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
          <!-- error messege if size of image is more than 500kb   -->
          <?php if(isset($_SESSION['size_err'])){ ?>
            <div class="alert alert-warning" role="alert">
              <?php
              echo $_SESSION['size_err'];
              unset($_SESSION['size_err']);
              ?>
            </div>
          <?php } ?>
          <!-- error messege if format of image is not jpg/png/jpeg/gif   -->
          <?php if(isset($_SESSION['format_err'])){ ?>
            <div class="alert alert-warning" role="alert">
              <?php
              echo $_SESSION['format_err'];
              unset($_SESSION['format_err']);
              ?>
            </div>
          <?php } ?>
        </div>
        <div class="from-group my-3">
          <div>
            <p>Present Photo: </p>
            <img class="md_thumbnail_img" src="uploads/users/<?php echo $afer_assoc['photo']; ?>" alt="photo">
          </div>
        </div>
        <div class="form-group pt-2 text-center my-3">
          <a  class="btn btn-warning text-white" href="users_info.php">Don't Update</a>
          <!-- <button type="submit" class="btn btn-info">Update</button> -->
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
                <div class="modal-body">
                  <div class="form-group my-3 row">
                    <label class="col-sm-3 col-form-label" for="psswrd">Password:</label>
                    <div class="col-sm-9">
                      <input id="psswrd" type="password" name="passConfrm" class="form-control" placeholder="Type your password to confirm!" >
                    </div>
                  </div>
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
