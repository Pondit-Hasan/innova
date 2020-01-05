<?php
    session_start();
    require 'db_connect.php';

    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $single_user_info_select = "SELECT * FROM users WHERE id=$id";
        $single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
        $afer_assoc = mysqli_fetch_assoc($single_select_reslt);
        echo $id;

        $_SESSION['exit_user_email'] = $afer_assoc['email'];
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--offline css link -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/my_style.css">


    <title>Password Reset Page</title>
  </head>
  <body>
    <div class="container m-auto">
        <div class="row">
            <div class="col-lg-6 col-sm-12 m-auto py-3 my-2">
                <div class="bg-success text-white">
                    <h2 class="text-center py-2 bg_color">Welcome to password reset Page!</h2>
                </div>
                   <!-- registration/ sign Up  form  -->
                <form action="forget_password_post.php" method="post" class="px-3 border border-info bg-light text-dark">
                    <div class="form-group my-3 row">
                        <label for="email" class="col-sm-4">Email:</label>
                        <div class="col-sm-8">
                            <!-- if user forget password when s/he is updating info -->
                            <?php if(isset($_SESSION['user_email'])) { ?>
                                <p><?php echo $_SESSION['user_email'];?></p>
                                <input name="login_exist_user_email" type="hidden" value="<?php echo $_SESSION['user_email'];?>" >
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group my-3 row">
                        <label for="email" class="col-sm-4">New Password:</label>
                        <div class="col-sm-8">
                            <input id="email" type="password" name="new_pass" class="form-control" placeholder="Set a new password." value="<?= (isset($_SESSION['new_pass'])) ? $_SESSION['new_pass'] : '' ?>" > <?php unset($_SESSION['new_pass']); ?>
                        </div>
                        <!-- error msg if email is empty -->
                        <?php if(isset($_SESSION['new_pass_empty'])){ ?>
                            <div class="alert alert-warning" role="alert">
                             <?php echo $_SESSION['new_pass_empty']; ?>
                            </div>
                        <?php } unset($_SESSION['new_pass_empty']); ?>
                    </div>
                    <div class="form-group my-3 row">
                        <label class="col-sm-4 col-form-label" for="pass">Confirm Password:</label>
                        <div class="col-sm-8">
                            <input id="pass" type="password" name="new_pass_confrm" class="form-control" placeholder="Retype your password." value="<?= (isset($_SESSION['confrm_pass'])) ? $_SESSION['confrm_pass'] : '' ?>" > <?php unset($_SESSION['confrm_pass']); ?>
                        </div>
                        <!-- error msg if password is empty -->
                        <?php if(isset($_SESSION['new_pass_confrm_empty'])){ ?>
                            <div class="alert alert-warning" role="alert">
                             <?php echo $_SESSION['new_pass_confrm_empty']; ?>
                            </div>
                        <?php } unset($_SESSION['new_pass_confrm_empty']); ?>
                    </div>
                    <!-- error msg if password or email is empty -->
                    <?php if(isset($_SESSION['new_pass_err'])){ ?>
                        <div class="alert alert-warning" role="alert">
                            <?php echo $_SESSION['new_pass_err']; ?>
                        </div>
                    <?php } unset($_SESSION['new_pass_err']); ?>
                    <div class="form-group pt-2 text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--  offline javaScript link    -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my_js.js"></script>
  </body>
</html>
