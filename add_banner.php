<!-- get the dashboard header  -->
<?php require 'dashboard_part/header.php'; ?>
<!-- register form div -->
<div class="content-wrapper">
  <div class="row">
    <div class="col m-auto py-3 my-2">
        <div class="bg_header text-white">
            <h2 class="text-center py-3">Welcome to add banner Page!</h2>
            <!-- success messege after registration complete  -->
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success text-white" role="alert">
                    <?php echo $_SESSION['success']; ?>
                </div>
            <?php } unset($_SESSION['success']); ?>
        </div>
           <!-- registration/ sign Up  form  -->
        <form action="add_banner_post.php" method="post" class="px-3 border border-info bg-light text-dark" enctype="multipart/form-data" >
            <div class="form-group my-3">
                <input type="text" name="banner_title" class="form-control" placeholder="enter a banner title!" value="<?= (isset($_SESSION['banner_title'])) ? $_SESSION['banner_title'] : '' ?>" > <?php unset($_SESSION['banner_title']); ?>
                <!-- error msg if name is empty -->
                <?php if(isset($_SESSION['banner_title_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                      <?php echo $_SESSION['banner_title_empty']; ?>
                    </div>
                <?php } unset($_SESSION['banner_title_empty']); ?>
            </div>
            <div class="form-group my-3">
                <textarea type="text" name="banner_desp" class="form-control" placeholder="Enter banner description." rows="5" ><?= (isset($_SESSION['banner_desp'])) ? $_SESSION['banner_desp'] : ''; unset($_SESSION['banner_desp']);  ?></textarea>
                <!-- error msg if email is empty -->
                <?php if(isset($_SESSION['banner_desp_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                     <?php echo $_SESSION['banner_desp_empty']; ?>
                    </div>
                <?php } unset($_SESSION['banner_desp_empty']); ?>
            </div>
            <div class="form-group my-3">
                <input type="text" name="banner_btn" class="form-control" placeholder="Enter button name!" value="<?= (isset($_SESSION['banner_btn'])) ? $_SESSION['banner_btn'] : ''; unset($_SESSION['banner_btn']);  ?>" >
                <!-- error msg if email is empty -->
                <?php if(isset($_SESSION['banner_btn_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                     <?php echo $_SESSION['banner_btn_empty']; ?>
                    </div>
                <?php } unset($_SESSION['banner_btn_empty']); ?>
            </div>
            <div class="form-group my-3">
                <select class="form-control" name="banner_status">
                    <!-- gender session check -->
                    <?php if(isset($_SESSION['banner_status'])) {
                        if($_SESSION['banner_status']==1 ) { ?>
                            <option value=0>Select status</option>
                            <option value=1  selected>Active</option>
                            <option value=2  >Deactive</option>
                        <?php } elseif($_SESSION['banner_status']==2 ) { ?>
                            <option value=0>Select status</option>
                            <option value=1 >Active</option>
                            <option value=2  selected>Deactive</option>
                        <?php } elseif ($_SESSION['banner_status']==0) { ?>
                            <option value=0 selected>Select status</option>
                            <option value=1 >Active</option>
                            <option value=2 >Deactive</option>
                        <?php }
                    } else { ?>
                        <option value=0>Select status</option>
                        <option value=1 >Active</option>
                        <option value=2 >Deactive</option>
                    <?php } unset($_SESSION['banner_status']); ?>
                </select>
                <!-- error msg if gender is not selected -->
                <?php if(isset($_SESSION['banner_status_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                        <?php echo $_SESSION['banner_status_empty']; ?>
                    </div>
                <?php } unset($_SESSION['banner_status_empty']); ?>
            </div>
            <div class="custom-file">
                <input type="file" name="banner_img" class="custom-file-input" id="customFile" >
                <label class="custom-file-label" for="customFile">Choose file</label>
                <!-- error msg if photo is empty -->
                <?php if(isset($_SESSION['banner_img_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                     <?php echo $_SESSION['banner_img_empty']; ?>
                    </div>
                <?php } unset($_SESSION['banner_img_empty']); ?>
            </div>
            <div class="form-group pt-2 text-center">
                <button type="submit" class="btn bg_header btn-lg">Add Banner</button>
            </div>
        </form>
    </div> <!-- register div end -->
  </div> <!-- row end  -->

<!-- get the dashboard footer  -->
<?php require 'dashboard_part/footer.php'; ?>
