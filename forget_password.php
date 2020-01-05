<?php
    session_start();
    require 'db_connect.php';

    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $single_user_info_select = "SELECT * FROM users WHERE id=$id";
        $single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
        $afer_assoc = mysqli_fetch_assoc($single_select_reslt);

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

                    <div class="text-warning p-2">
                       <p>Not yet a member? <a class="text-white" href="register.php">Click here</a> to register!</p>
                    </div>
                </div>
                   <!-- registration/ sign Up  form  -->
                <form action="forget_password_post.php" method="post" class="px-3 border border-info bg-light text-dark">
                    <div class="form-group my-3 row">
                        <label for="email" class="col-sm-4">Email:</label>
                        <div class="col-sm-8">
                            <!-- if user forget password when s/he is updating info -->
                            <?php if(isset($_SESSION['exit_user_email'])) { ?>
                                <p><?php echo $_SESSION['exit_user_email'];
                                unset($_SESSION['exit_user_email']);?></p>
                                <input name="login_exist_user_email" type="hidden" value="<?php echo $afer_assoc['email'];?>" >
                            <?php } else { ?>
                                <!-- if user forget password when s/he want to login -->
                                <input name="user_email" type="text" class="form-control" placeholder="Enter your eamil!">
                            <?php } ?>

                            <!-- error msg if email is empty -->
                            <?php if(isset($_SESSION['email_empty'])){ ?>
                                <div class="alert alert-warning" role="alert">
                                <?php echo $_SESSION['email_empty']; ?>
                                </div>
                            <?php } unset($_SESSION['email_empty']); ?>
                            <!-- error msg if email is not found -->
                            <?php if(isset($_SESSION['userNotFound'])){ ?>
                                <div class="alert alert-warning" role="alert">
                                <?php echo $_SESSION['userNotFound']; ?>
                                </div>
                            <?php } unset($_SESSION['userNotFound']); ?>


                        </div>

                    </div>
                    <div class="form-group pt-2 text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Next</button>
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
