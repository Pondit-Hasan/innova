<?php
require 'dashboard_part/header.php';
require 'db_connect.php';

$all_users_info_select = "SELECT * FROM users";
$select_reslt = mysqli_query($db_connect, $all_users_info_select);

?>

<div class="content-wrapper">
  <div class="row">
    <div class="col m-auto py-3 my-2">
      <div class="card bg-light mb-3">
        <div class="card-header text-center">
          <h3 class="bg_header py-3">All users information here!</h3>
          <?php if (isset($_SESSION['notAllow'])): ?>
            <div class="alert alert-danger py-3" role="alert">
              <?php echo $_SESSION['notAllow']; unset($_SESSION['notAllow']); ?>
            </div>
          <?php endif; ?>
            <!-- success messege after update successfully completed!   -->
            <?php if(isset($_SESSION['update_success'])){ ?>
              <h3 class="text-center text-success py-3">
              <div class="alert alert-success" role="alert">
                <?php
                  echo $_SESSION['update_success'];
                  unset($_SESSION['update_success']);
                ?>
              </div>
            <?php } ?>
            <!-- success messege after delete selected data   -->
            <?php if(isset($_SESSION['success_del'])){ ?>
              <div class="alert alert-success" role="alert">
                <?php
                  echo $_SESSION['success_del'];
                  unset($_SESSION['success_del']);
                ?>
              </div>
            </h3>
            <?php } ?>
        </div> <!-- card header end   -->
        <div class="card-body">
          <table class="table table-striped table-responsive card-text">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Role</th>
                <th scope="col">Photo</th>
                <th class="text-center" scope="col" colspan="3">Action</th>
              </tr>
            </thead>
          <tbody>
            <?php
              foreach($select_reslt as $ind_rslt) { ?>
            <tr>
              <th scope="row"><?php echo $ind_rslt['id']; ?></th>
              <td><?php echo $ind_rslt['name']; ?></td>
              <td><?php echo $ind_rslt['email']; ?></td>
              <td><?php echo $ind_rslt['age']; ?></td>
              <td><?php echo $ind_rslt['gender']; ?></td>
              <td>
                <?php if($ind_rslt['role']==1) {
                    echo "Admin";
                  }
                  else if($ind_rslt['role']==2) {
                    echo "Modarator";
                  }
                  else {
                    echo "Editor";
                } ?>
              </td>
              <td><img class="thumbnail_img" src="uploads/users/<?php echo $ind_rslt['photo']; ?>" alt="photo_<?php echo $ind_rslt['id']; ?>" ></td>
              <td><a href="single_user_info.php?id=<?php echo $ind_rslt['id'];?>" class="btn btn-primary">View</a></td>
              <td>
                <?php if ($_SESSION['log_role']==1 || $_SESSION['log_role']==2): ?>
                  <a href="edit_user_info.php?id=<?php echo $ind_rslt['id'];?>" class="btn btn-info">Edit</a>
                <?php endif; ?>
              </td>
              <td>
              <!-- Button trigger modal -->
              <?php if ($_SESSION['log_role']==1): ?>
                <a href="delete_info.php?id=<?php echo $ind_rslt['id'];?>" data-toggle="modal" data-target="#exampleModal_<?php echo $ind_rslt['id'];?>" class="btn btn-danger text-white">Delete</a>
              <?php endif; ?>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal_<?php echo $ind_rslt['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you wanna delete your info?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
                        <a class="btn btn-danger"href="delete_info.php?id=<?php echo $ind_rslt['id'];?>">Yes</a>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
          </table>
      </div> <!-- card body end  -->
      </div>
    </div>
  </div> <!-- row end  -->

  <!-- get the dashboard footer  -->
  <?php require 'dashboard_part/footer.php'; ?>
