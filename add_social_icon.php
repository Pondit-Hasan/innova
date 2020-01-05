<!-- get the dashboard header  -->
<?php require 'dashboard_part/header.php'; ?>
<!-- register form div -->
<div class="content-wrapper">
  <div class="row">
    <div class="col m-auto py-3 my-2">
        <div class="bg_header text-white">
            <h2 class="text-center py-3">Welcome to add social_icon Page!</h2>
            <!-- success messege after registration complete  -->
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success text-white" role="alert">
                    <?php echo $_SESSION['success']; ?>
                </div>
            <?php } unset($_SESSION['success']); ?>
        </div>
           <!-- registration/ sign Up  form  -->
        <form action="add_social_icon_post.php" method="post" class="px-3 border border-info bg-light text-dark" enctype="multipart/form-data" >
            <div class="form-group my-3">
                <input type="text" name="social_icon_name" class="form-control" placeholder="enter a social_icon name!" value="<?= (isset($_SESSION['social_icon_name'])) ? $_SESSION['social_icon_name'] : '' ?>" > <?php unset($_SESSION['social_icon_name']); ?>
                <!-- error msg if name is empty -->
                <?php if(isset($_SESSION['social_icon_name_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                      <?php echo $_SESSION['social_icon_name_empty']; ?>
                    </div>
                <?php } unset($_SESSION['social_icon_name_empty']); ?>
            </div>
            <div class="form-group my-3">
                <input type="url" name="social_icon_link" class="form-control" placeholder="enter a social_icon link!" value="<?= (isset($_SESSION['social_icon_link'])) ? $_SESSION['social_icon_link'] : '' ?>" > <?php unset($_SESSION['social_icon_link']); ?>
                <!-- error msg if name is empty -->
                <?php if(isset($_SESSION['social_icon_link_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                      <?php echo $_SESSION['social_icon_link_empty']; ?>
                    </div>
                <?php } unset($_SESSION['social_icon_link_empty']); ?>
            </div>
            <div class="form-group my-3">
                <select class="form-control" name="social_icon">
                    <!-- gender session check -->
                    <?php if(isset($_SESSION['social_icon'])) {
                        if($_SESSION['social_icon']=="" ) { ?>
                            <option value="" selected>Select Social Icon</option>
                            <option value="facebook">Facebook</option>
                            <option value="twitter" >Twitter</option>
                            <option value="google-plus">Google Plus</option>
                            <option value="youtube">Youtube</option>
                        <?php } elseif($_SESSION['social_icon']=="facebook" ) { ?>
                          <option value="">Select Social Icon</option>
                          <option value="facebook" selected>Facebook</option>
                          <option value="twitter">Twitter</option>
                          <option value="google-plus">Google Plus</option>
                          <option value="youtube">Youtube</option>
                        <?php } elseif ($_SESSION['social_icon']=="twitter") { ?>
                          <option value="">Select Social Icon</option>
                          <option value="facebook" selected>Facebook</option>
                          <option value="twitter">Twitter</option>
                          <option value="google-plus">Google Plus</option>
                          <option value="youtube">Youtube</option>
                        <?php } elseif ($_SESSION['social_icon']=="google-plus") { ?>
                          <option value="">Select Social Icon</option>
                          <option value="facebook">Facebook</option>
                          <option value="twitter">Twitter</option>
                          <option value="google-plus" selected>Google Plus</option>
                          <option value="youtube">Youtube</option>
                        <?php } elseif ($_SESSION['social_icon']=="youtube") { ?>
                          <option value="">Select Social Icon</option>
                          <option value="facebook">Facebook</option>
                          <option value="twitter">Twitter</option>
                          <option value="google-plus">Google Plus</option>
                          <option value="youtube" selected>Youtube</option>
                        <?php }
                    } else { ?>
                      <option value="">Select Social Icon</option>
                      <option value="facebook">Facebook</option>
                      <option value="twitter">Twitter</option>
                      <option value="google-plus">Google Plus</option>
                      <option value="youtube">Youtube</option>
                    <?php } unset($_SESSION['social_icon']); ?>
                </select>
                <!-- error msg if gender is not selected -->
                <?php if(isset($_SESSION['social_icon_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                        <?php echo $_SESSION['social_icon_empty']; ?>
                    </div>
                <?php } unset($_SESSION['social_icon_empty']); ?>
            </div>

            <div class="form-group pt-2 text-center">
                <button type="submit" class="btn bg_header btn-lg">Add social_icon</button>
            </div>
        </form>
    </div> <!-- register div end -->
  </div> <!-- row end  -->

<!-- get the dashboard footer  -->
<?php require 'dashboard_part/footer.php'; ?>
