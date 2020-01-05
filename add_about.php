<!-- get the dashboard header  -->
<?php require 'dashboard_part/header.php'; ?>
<!-- register form div -->
<div class="content-wrapper">
  <div class="row">
    <div class="col m-auto py-3 my-2">
        <div class="bg_header text-white">
            <h2 class="text-center py-3">Welcome to add about Page!</h2>
            <!-- success messege after registration complete  -->
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success text-white" role="alert">
                    <?php echo $_SESSION['success']; ?>
                </div>
            <?php } unset($_SESSION['success']); ?>
        </div>
           <!-- registration/ sign Up  form  -->
        <form action="add_about_post.php" method="post" class="px-3 border border-info bg-light text-dark" enctype="multipart/form-data" >
            <div class="form-group my-3">
                <input type="text" name="about_title" class="form-control" placeholder="enter a about title!" value="<?= (isset($_SESSION['about_title'])) ? $_SESSION['about_title'] : '' ?>" > <?php unset($_SESSION['about_title']); ?>
                <!-- error msg if name is empty -->
                <?php if(isset($_SESSION['about_title_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                      <?php echo $_SESSION['about_title_empty']; ?>
                    </div>
                <?php } unset($_SESSION['about_title_empty']); ?>
            </div>
            <div class="form-group my-3">
                <textarea type="text" name="about_desp" class="form-control" placeholder="Enter about description." rows="5" ><?= (isset($_SESSION['about_desp'])) ? $_SESSION['about_desp'] : ''; unset($_SESSION['about_desp']);  ?></textarea>
                <!-- error msg if email is empty -->
                <?php if(isset($_SESSION['about_desp_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                     <?php echo $_SESSION['about_desp_empty']; ?>
                    </div>
                <?php } unset($_SESSION['about_desp_empty']); ?>
            </div>
            <div class="form-group my-3">
                <input type="text" name="about_sub_title" class="form-control" placeholder="Enter sub title of about section!" value="<?= (isset($_SESSION['about_sub_title'])) ? $_SESSION['about_sub_title'] : ''; unset($_SESSION['about_sub_title']);  ?>" >
                <!-- error msg if email is empty -->
                <?php if(isset($_SESSION['about_sub_title_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                     <?php echo $_SESSION['about_sub_title_empty']; ?>
                    </div>
                <?php } unset($_SESSION['about_sub_title_empty']); ?>
            </div>
            <div class="form-group my-3">
                <input type="text" name="about_features" class="form-control" placeholder="Enter all features of about section with comma!" value="<?= (isset($_SESSION['about_features'])) ? $_SESSION['about_features'] : ''; unset($_SESSION['about_features']);  ?>" >
                <!-- error msg if email is empty -->
                <?php if(isset($_SESSION['about_features_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                     <?php echo $_SESSION['about_features_empty']; ?>
                    </div>
                <?php } unset($_SESSION['about_features_empty']); ?>
            </div>
            <div class="form-group my-3">
                <select class="form-control" name="about_status">
                    <!-- gender session check -->
                    <?php if(isset($_SESSION['about_status'])) {
                        if($_SESSION['about_status']==1 ) { ?>
                            <option value=0>Select status</option>
                            <option value=1  selected>Active</option>
                            <option value=2  >Deactive</option>
                        <?php } elseif($_SESSION['about_status']==2 ) { ?>
                            <option value=0>Select status</option>
                            <option value=1 >Active</option>
                            <option value=2  selected>Deactive</option>
                        <?php } elseif ($_SESSION['about_status']==0) { ?>
                            <option value=0 selected>Select status</option>
                            <option value=1 >Active</option>
                            <option value=2 >Deactive</option>
                        <?php }
                    } else { ?>
                        <option value=0>Select status</option>
                        <option value=1 >Active</option>
                        <option value=2 >Deactive</option>
                    <?php } unset($_SESSION['about_status']); ?>
                </select>
                <!-- error msg if gender is not selected -->
                <?php if(isset($_SESSION['about_status_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                        <?php echo $_SESSION['about_status_empty']; ?>
                    </div>
                <?php } unset($_SESSION['about_status_empty']); ?>
            </div>
            <div class="custom-file">
                <input type="file" name="about_img" class="custom-file-input" id="customFile" >
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <!-- error msg if photo is empty -->
            <?php if(isset($_SESSION['about_img_empty'])){ ?>
                <div class="alert alert-warning my-2" role="alert">
                 <?php echo $_SESSION['about_img_empty']; ?>
                </div>
            <?php } unset($_SESSION['about_img_empty']); ?>
            <div class="form-group pt-2 text-center">
                <button type="submit" class="btn bg_header btn-lg">Add about</button>
            </div>
        </form>
    </div> <!-- register div end -->
  </div> <!-- row end  -->

<!-- get the dashboard footer  -->
<?php require 'dashboard_part/footer.php'; ?>
