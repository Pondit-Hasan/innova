<!-- get the dashboard header  -->
<?php require 'dashboard_part/header.php'; ?>
<!-- register form div -->
<div class="content-wrapper">
  <div class="row">
    <div class="col m-auto py-3 my-2">
        <div class="bg_header text-white">
            <h2 class="text-center py-3">Welcome to add logo Page!</h2>
            <!-- success messege after registration complete  -->
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success text-white" role="alert">
                    <?php echo $_SESSION['success']; ?>
                </div>
            <?php } unset($_SESSION['success']); ?>
        </div>
           <!-- registration/ sign Up  form  -->
        <form action="add_logo_post.php" method="post" class="px-3 border border-info bg-light text-dark" enctype="multipart/form-data" >
            <div class="form-group my-3">
                <select class="form-control" name="logo_status">
                    <!-- gender session check -->
                    <?php if(isset($_SESSION['logo_status'])) {
                        if($_SESSION['logo_status']==1 ) { ?>
                            <option value=0>Select status</option>
                            <option value=1  selected>Active</option>
                            <option value=2  >Deactive</option>
                        <?php } elseif($_SESSION['logo_status']==2 ) { ?>
                            <option value=0>Select status</option>
                            <option value=1 >Active</option>
                            <option value=2  selected>Deactive</option>
                        <?php } elseif ($_SESSION['logo_status']==0) { ?>
                            <option value=0 selected>Select status</option>
                            <option value=1 >Active</option>
                            <option value=2 >Deactive</option>
                        <?php }
                    } else { ?>
                        <option value=0>Select status</option>
                        <option value=1 >Active</option>
                        <option value=2 >Deactive</option>
                    <?php } unset($_SESSION['logo_status']); ?>
                </select>
                <!-- error msg if gender is not selected -->
                <?php if(isset($_SESSION['logo_status_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                        <?php echo $_SESSION['logo_status_empty']; ?>
                    </div>
                <?php } unset($_SESSION['logo_status_empty']); ?>
            </div>
            <div class="custom-file">
                <input type="file" name="logo_img" class="custom-file-input" id="customFile" >
                <label class="custom-file-label" for="customFile">Choose file</label>
                <!-- error msg if photo is empty -->
                <?php if(isset($_SESSION['logo_img_empty'])){ ?>
                    <div class="alert alert-warning mt-2" role="alert">
                     <?php echo $_SESSION['logo_img_empty']; ?>
                    </div>
                <?php } unset($_SESSION['logo_img_empty']); ?>
            </div>
            <div class="form-group pt-2 text-center">
                <button type="submit" class="btn bg_header btn-lg">Add logo</button>
            </div>
        </form>
    </div> <!-- register div end -->
  </div> <!-- row end  -->

<!-- get the dashboard footer  -->
<?php require 'dashboard_part/footer.php'; ?>
