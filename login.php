<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.urbanui.com/victory/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jun 2019 09:43:04 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Victory Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="dashboard_asset/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="dashboard_asset/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="dashboard_asset/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="dashboard_asset/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="dashboard_asset/css/style.css">
  <link rel="stylesheet" href="css/my_style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="dashboard_asset/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth">
          <div class="row w-100">
            <div class="bg_header text-white col-lg-8 mx-auto">
                <h2 class="text-center py-2" id="test">Welcome to our LogIn Page!</h2>
                <!-- unauthorized registration notification -->
                <?php if (isset($_SESSION['unauthorized'])): ?>
                  <p class="text-danger bg-secondary"><?php echo $_SESSION['unauthorized']; ?></p>
                <?php endif; ?>
            </div>
            <div class="col-lg-8 mx-auto">
              <div class="row">
                <div class="col-lg-6 bg-white bg-warning">
                  <div class="auth-form-light text-left p-5">
                    <h2>Login</h2>
                    <h4 class="font-weight-light">Hello! let's get started</h4>
                    <form class="pt-5"  action="login_post.php" method="post" >
                      <!-- error msg if password or email doesn't exist in database -->
                      <?php if(isset($_SESSION['login_err'])){ ?>
                          <div class="alert alert-warning" role="alert">
                              <?php echo $_SESSION['login_err']; ?>
                          </div>
                      <?php } unset($_SESSION['login_err']); ?>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="<?= (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; unset($_SESSION['email']); ?>" >
                          <i class="mdi mdi-account"></i>
                          <!-- error msg if email is empty -->
                          <?php if(isset($_SESSION['email_empty'])){ ?>
                              <div class="mt-2 alert alert-warning" role="alert">
                               <?php echo $_SESSION['email_empty']; ?>
                              </div>
                          <?php } unset($_SESSION['email_empty']); ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?= (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; unset($_SESSION['password']); ?>" >
                          <i class="eye mdi mdi-eye-off" id="eye"></i>
                          <!-- error msg if password is empty -->
                          <?php if(isset($_SESSION['pass_empty'])){ ?>
                              <div class="mt-2 alert alert-warning m-auto" role="alert">
                               <?php echo $_SESSION['pass_empty']; ?>
                              </div>
                          <?php } unset($_SESSION['pass_empty']); ?>
                        </div>
                        <div class="mt-5">
                          <button type="submit" class="btn btn-block bg_header btn-lg font-weight-medium">LogIn</button>
                        </div>
                        <div class="mt-3 text-center">
                          <a href="forget_password.php" class="auth-link text-black">Forgot password?</a>
                        </div>
                    </form>
                  </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                  <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="dashboard_asset/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="dashboard_asset/js/off-canvas.js"></script>
  <script src="dashboard_asset/js/hoverable-collapse.js"></script>
  <script src="dashboard_asset/js/misc.js"></script>
  <script src="dashboard_asset/js/settings.js"></script>
  <script src="dashboard_asset/js/todolist.js"></script>
  <!-- custom js script -->
  <script type="text/javascript" src="js/my_js.js"></script>
  <!-- endinject -->
</body>
<!-- Mirrored from www.urbanui.com/victory/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jun 2019 09:43:04 GMT -->
</html>
