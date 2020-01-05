<?php require 'dashboard_part/header.php'; ?>


<!-- register form div -->
<div class="content-wrapper">
  <div class="row">
    <!-- designation check  -->
    <?php if ($_SESSION['log_role'] != 1): ?>
        <div class="col-sm-12">
            <p class="bg-warning py-3 text-center">I am afraid you  are not allow to this page.</p>
        </div>
    <?php else : ?>
    <div class="col m-auto py-3 my-2">
        <div class="bg-success text-white">
            <h2 class="text-center py-3 bg_header">Welcome to our Sign Up Page!</h2>
            <!-- success messege after registration complete  -->
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success text-white mt-2" role="alert">
                    <?php echo $_SESSION['success']; ?>
                </div>
            <?php } unset($_SESSION['success']); ?>
        </div>
           <!-- registration/ sign Up  form  -->
        <form action="register_post.php" method="post" class="px-3 border border-info bg-light text-dark" enctype="multipart/form-data" >
            <div class="form-group my-3">
                <input type="text" name="fnane" class="form-control" placeholder="Type your name." value="<?= (isset($_SESSION['name'])) ? $_SESSION['name'] : '' ?>" > <?php unset($_SESSION['name']); ?>
                <!-- error msg if name is empty -->
                <?php if(isset($_SESSION['name_empty'])){ ?>
                    <div class="alert alert-warning" role="alert">
                      <?php echo $_SESSION['name_empty']; ?>
                    </div>
                <?php } unset($_SESSION['name_empty']); ?>
            </div>
            <div class="form-group my-3">
                <input type="text" name="email" class="form-control" placeholder="Type your email." value="<?= (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" > <?php unset($_SESSION['email']); ?>
                <!-- error msg if email is empty -->
                <?php if(isset($_SESSION['email_empty'])){ ?>
                    <div class="alert alert-warning" role="alert">
                     <?php echo $_SESSION['email_empty']; ?>
                    </div>
                <?php } unset($_SESSION['email_empty']); ?>
                 <!-- error msg if email is exist -->
                 <?php if(isset($_SESSION['exist'])){ ?>
                    <div class="alert alert-warning" role="alert">
                     <?php echo $_SESSION['exist']; ?>
                    </div>
                <?php } unset($_SESSION['exist']); ?>
            </div>
            <div class="form-group my-3">
                <input type="password" name="password" class="form-control" placeholder="Type your password." value="<?= (isset($_SESSION['password'])) ? $_SESSION['password'] : '' ?>" > <?php unset($_SESSION['password']); ?>
                <!-- error msg if password is empty -->
                <?php if(isset($_SESSION['pass_empty'])){ ?>
                    <div class="alert alert-warning" role="alert">
                     <?php echo $_SESSION['pass_empty']; ?>
                    </div>
                <?php } unset($_SESSION['pass_empty']); ?>
            </div>
            <div class="form-group my-3">
                <input type="number" name="age" class="form-control" placeholder="Type your age." value="<?= (isset($_SESSION['age'])) ? $_SESSION['age'] : '' ?>" > <?php unset($_SESSION['age']); ?>
                <!-- error msg if age is empty -->
                <?php if(isset($_SESSION['age_empty'])){ ?>
                    <div class="alert alert-warning" role="alert">
                      <?php echo $_SESSION['age_empty']; ?>
                    </div>
                <?php } unset($_SESSION['age_empty']); ?>
            </div>
            <div class="form-group my-3">
                <select class="form-control" name="gender">
                    <!-- gender session check -->
                    <?php if(isset($_SESSION['gender'])) {
                        if($_SESSION['gender']=='male') { ?>
                            <option value="">Select your gender</option>
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                        <?php } elseif($_SESSION['gender']=='female') { ?>
                            <option value="">Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female" selected>Female</option>
                        <?php } elseif ($_SESSION['gender']=='') { ?>
                            <option value="" selected>Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        <?php }

                    } else { ?>
                        <option value="">Select your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    <?php } unset($_SESSION['gender']); ?>
                </select>
                <!-- error msg if gender is not selected -->
                <?php if(isset($_SESSION['gender_empty'])){ ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo $_SESSION['gender_empty']; ?>
                    </div>
                <?php } unset($_SESSION['gender_empty']); ?>
            </div>
            <div class="form-group my-3">
                <select class="form-control" name="role">
                    <!-- role session check -->
                    <?php if(isset($_SESSION['role'])){
                        if($_SESSION['role']==1) { ?>
                            <option value="">Select your role</option>
                            <option value="1" selected>Admin</option>
                            <option value="2">Modarator</option>
                            <option value="3">Editor</option>
                        <?php } elseif ($_SESSION['role']==2) { ?>
                            <option value="">Select your role</option>
                            <option value="1">Admin</option>
                            <option value="2" selected>Modarator</option>
                            <option value="3">Editor</option>
                        <?php } elseif ($_SESSION['role']==3) { ?>
                            <option value="">Select your role</option>
                            <option value="1">Admin</option>
                            <option value="2">Modarator</option>
                            <option value="3" selected>Editor</option>
                        <?php } elseif ($_SESSION['role']=='') { ?>
                            <option value="" selected>Select your role</option>
                            <option value="1">Admin</option>
                            <option value="2">Modarator</option>
                            <option value="3">Editor</option>
                        <?php }

                    } else { ?>
                        <option value="">Select your role</option>
                        <option value="1">Admin</option>
                        <option value="2">Modarator</option>
                        <option value="3">Editor</option>
                    <?php } unset($_SESSION['role']); ?>
                </select>
                <!-- error msg if role is not selected -->
                <?php if(isset($_SESSION['role_empty'])){ ?>
                    <div class="alert alert-warning" role="alert">
                     <?php echo $_SESSION['role_empty']; ?>
                    </div>
                <?php } unset($_SESSION['role_empty']); ?>
            </div>
            <div class="custom-file">
                <input type="file" name="photo" class="custom-file-input" id="customFile" >
                <label class="custom-file-label" for="customFile">Choose file</label>
                <!-- error msg if photo is empty -->
                <?php if(isset($_SESSION['photo_empty'])){ ?>
                    <div class="alert alert-warning" role="alert">
                     <?php echo $_SESSION['photo_empty']; ?>
                    </div>
                <?php } unset($_SESSION['photo_empty']); ?>
            </div>
            <div class="form-group pt-2 text-center">
                <button type="submit" class="btn bg_header btn-lg">Submit</button>
            </div>
        </form>
    </div> <!-- register div end -->
    <?php endif; ?>
  </div> <!-- row end  -->

<!-- get the dashboard footer  -->
<?php require 'dashboard_part/footer.php'; ?>
