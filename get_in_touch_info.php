<?php
require 'dashboard_part/header.php';
require 'db_connect.php';

$all_users_info_select = "SELECT * FROM get_in_touch";
$select_reslt = mysqli_query($db_connect, $all_users_info_select);

?>

<div class="content-wrapper">
  <div class="row">
    <div class="col m-auto py-3 my-2">
      <div class="card bg-light mb-3">
        <div class="card-header text-center">
          <h3 class="bg_header py-3">All Get In Touch information here!</h3>
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
            <!-- success messege after get_in_touch status update successfully completed!   -->
            <?php if(isset($_SESSION['status_update'])){ ?>
              <h3 class="text-center text-success py-3">
              <div class="alert alert-success" role="alert">
                <?php
                  echo $_SESSION['status_update'];
                  unset($_SESSION['status_update']);
                ?>
              </div>
            <?php } ?>
        </div> <!-- card header end   -->
        <div class="card-body">
          <table class="table table-striped table-responsive card-text">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Get In Touch Title</th>
                <th scope="col">Get In Touch  Description</th>
                <th scope="col">Get In Touch  Button</th>
                <th scope="col">Get In Touch  Status</th>
                <th class="text-center" scope="col" colspan="3">Action</th>
              </tr>
            </thead>
          <tbody>
            <?php
              foreach($select_reslt as $ind_rslt) { ?>
            <tr>
              <th scope="row"><?php echo $ind_rslt['id']; ?></th>
              <td><?php echo $ind_rslt['get_in_touch_title']; ?></td>
              <td><?php echo substr($ind_rslt['get_in_touch_desp'], 0, 30) . '...<span class="text-primary">view more</span>' ; ?></td>
              <td><?php echo $ind_rslt['get_in_touch_btn']; ?></td>
              <td>
                <?php if($ind_rslt['get_in_touch_status']==1) { ?>
                    <button class="btn btn-success" data-toggle="modal" data-target="#statusActive_<?php echo $ind_rslt['id'] ?>" >Active</button>
                    <!-- get_in_touch status button Modal -->
                    <div class="modal fade" id="statusActive_<?php echo $ind_rslt['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Your selected get in touch is already actived!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Ok</button>
                          </div>
                        </div>
                      </div>
                    </div> <!-- get_in_touch status button Modal end -->
                  <?php } else { ?>
                    <a href="edit_get_in_touch_status.php?id=<?php echo $ind_rslt['id'];?>" class="btn btn-warning" data-toggle="modal" data-target="#statusModal_<?php echo $ind_rslt['id'];?>">Deactive</a>
                  <?php } ?>
                  <!-- get_in_touch status button Modal -->
                  <div class="modal fade" id="statusModal_<?php echo $ind_rslt['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure you wanna change get_in_touch status?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
                          <a class="btn btn-success"href="edit_get_in_touch_status.php?id=<?php echo $ind_rslt['id'];?>">Yes</a>
                        </div>
                      </div>
                    </div>
                  </div> <!-- get_in_touch status button Modal end -->
              </td>
              <td><a href="single_get_in_touch_info.php?id=<?php echo $ind_rslt['id'];?>" class="btn btn-primary">View</a></td>
              <td><a href="edit_get_in_touch_info.php?id=<?php echo $ind_rslt['id'];?>" class="btn btn-info">Edit</a></td>
              <td>
              <!-- Button trigger modal -->
              <a href="delete_get_in_touch.php?id=<?php echo $ind_rslt['id'];?>" data-toggle="modal" data-target="#exampleModal_<?php echo $ind_rslt['id'];?>" class="btn btn-danger text-white">Delete</a>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger">
                          <a class=" text-white"href="delete_get_in_touch.php?id=<?php echo $ind_rslt['id'];?>">Yes</a>
                        </button>
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
