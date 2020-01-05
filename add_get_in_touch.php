<!-- get the dashboard footer  -->
<?php require 'dashboard_part/header.php'; ?>
<!-- register form div -->
<div class="content-wrapper">
  <div class="row">
    <div class="col m-auto py-3 my-2">
        <div class="bg_header text-white">
            <h2 class="text-center py-3">Welcome to add get_in_touch Page!</h2>
            <!-- success messege after registration complete  -->
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success text-white" role="alert">
                    <?php echo $_SESSION['success']; ?>
                </div>
            <?php } unset($_SESSION['success']); ?>
        </div>
           <!-- registration/ sign Up  form  -->
        <form action="add_get_in_touch_post.php" method="post" class="px-3 border border-info bg-light text-dark" enctype="multipart/form-data" >
            <div class="form-group my-3">
                <input type="text" name="get_in_touch_title" class="form-control" placeholder="enter a get_in_touch title!" value="<?= (isset($_SESSION['get_in_touch_title'])) ? $_SESSION['get_in_touch_title'] : '' ?>" > <?php unset($_SESSION['get_in_touch_title']); ?>
                <!-- error msg if name is empty -->
                <?php if(isset($_SESSION['get_in_touch_title_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                      <?php echo $_SESSION['get_in_touch_title_empty']; ?>
                    </div>
                <?php } unset($_SESSION['get_in_touch_title_empty']); ?>
            </div>
            <div class="form-group my-3">
                <textarea type="text" name="get_in_touch_desp" class="form-control" placeholder="Enter get_in_touch description." rows="5" ><?= (isset($_SESSION['get_in_touch_desp'])) ? $_SESSION['get_in_touch_desp'] : ''; unset($_SESSION['get_in_touch_desp']);  ?></textarea>
                <!-- error msg if email is empty -->
                <?php if(isset($_SESSION['get_in_touch_desp_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                     <?php echo $_SESSION['get_in_touch_desp_empty']; ?>
                    </div>
                <?php } unset($_SESSION['get_in_touch_desp_empty']); ?>
            </div>
            <div class="form-group my-3">
                <input type="text" name="get_in_touch_btn" class="form-control" placeholder="Enter button name!"<?= (isset($_SESSION['get_in_touch_btn'])) ? $_SESSION['get_in_touch_btn'] : ''; unset($_SESSION['get_in_touch_btn']);  ?> >
                <!-- error msg if email is empty -->
                <?php if(isset($_SESSION['get_in_touch_btn_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                     <?php echo $_SESSION['get_in_touch_btn_empty']; ?>
                    </div>
                <?php } unset($_SESSION['get_in_touch_btn_empty']); ?>
            </div>
            <div class="form-group my-3">
                <select class="form-control" name="get_in_touch_status">
                    <!-- gender session check -->
                    <?php if(isset($_SESSION['get_in_touch_status'])) {
                        if($_SESSION['get_in_touch_status']==1 ) { ?>
                            <option value=0>Select status</option>
                            <option value=1  selected>Active</option>
                            <option value=2  >Deactive</option>
                        <?php } elseif($_SESSION['get_in_touch_status']==2 ) { ?>
                            <option value=0>Select status</option>
                            <option value=1 >Active</option>
                            <option value=2  selected>Deactive</option>
                        <?php } elseif ($_SESSION['get_in_touch_status']==0) { ?>
                            <option value=0 selected>Select status</option>
                            <option value=1 >Active</option>
                            <option value=2 >Deactive</option>
                        <?php }
                    } else { ?>
                        <option value=0>Select status</option>
                        <option value=1 >Active</option>
                        <option value=2 >Deactive</option>
                    <?php } unset($_SESSION['get_in_touch_status']); ?>
                </select>
                <!-- error msg if gender is not selected -->
                <?php if(isset($_SESSION['get_in_touch_status_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                        <?php echo $_SESSION['get_in_touch_status_empty']; ?>
                    </div>
                <?php } unset($_SESSION['get_in_touch_status_empty']); ?>
            </div>
            <div class="form-group pt-2 text-center">
                <button type="submit" class="btn bg_header btn-lg">Add get_in_touch</button>
            </div>
        </form>
    </div> <!-- register div end -->
  </div> <!-- row end  -->

<!-- get the dashboard footer  -->
<?php require 'dashboard_part/footer.php'; ?>
