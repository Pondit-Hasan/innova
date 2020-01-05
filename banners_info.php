<?php
require 'dashboard_part/header.php';
require 'db_connect.php';

$all_users_info_select = "SELECT * FROM banners WHERE delete_status=0";
$select_reslt = mysqli_query($db_connect, $all_users_info_select);

?>

<div class="content-wrapper">
  <div class="row">
    <div class="col m-auto py-3 my-2">
      <div class="card bg-light mb-3">
        <div class="card-header text-center">
          <h3 class="bg_header py-3">All Banners information here!</h3>
            <!-- error messege when user wnat to delete active banner !   -->
            <?php if(isset($_SESSION['error'])){ ?>
              <h3 class="text-center text-success py-3">
              <div class="alert alert-danger" role="alert">
                <?php
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
                ?>
              </div>
            <?php } ?>
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
            <!-- success messege after banner status update successfully completed!   -->
            <?php if(isset($_SESSION['status_active'])){ ?>
              <h3 class="text-center text-success py-3">
              <div class="alert alert-success" role="alert">
                <?php
                  echo $_SESSION['status_active'];
                  unset($_SESSION['status_active']);
                ?>
              </div>
            <?php } ?>
            <!-- success messege after banner status update successfully completed!   -->
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
                <th scope="col">Banner Title</th>
                <th scope="col">Banner description</th>
                <th scope="col">Banner Button</th>
                <th scope="col">Banner Status</th>
                <th scope="col">Banner Image</th>
                <th class="text-center" scope="col" colspan="3">Action</th>
              </tr>
            </thead>
          <tbody>
            <?php
              foreach($select_reslt as $ind_rslt) { ?>
            <tr>
              <th scope="row"><?php echo $ind_rslt['id']; ?></th>
              <td><?php echo $ind_rslt['banner_title']; ?></td>
              <td><?php echo substr($ind_rslt['banner_desp'], 0, 30) . '...<span class="text-primary">view more</span>' ; ?></td>
              <td><?php echo $ind_rslt['banner_btn']; ?></td>
              <td>
                <?php if($ind_rslt['banner_status']==1) { ?>
                    <button class="btn btn-success" data-toggle="modal" data-target="#statusActive_<?php echo $ind_rslt['id'] ?>" >Active</button>
                    <!-- banner status button Modal -->
                    <div class="modal fade" id="statusActive_<?php echo $ind_rslt['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Your selected banner is already actived!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Ok</button>
                          </div>
                        </div>
                      </div>
                    </div> <!-- banner status button Modal end -->
                  <?php } else { ?>
                    <a href="edit_banner_status.php?id=<?php echo $ind_rslt['id'];?>" class="btn btn-warning" data-toggle="modal" data-target="#statusModal_<?php echo $ind_rslt['id'];?>">Deactive</a>
                  <?php } ?>
                  <!-- banner status button Modal -->
                  <div class="modal fade" id="statusModal_<?php echo $ind_rslt['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure you wanna change banner status?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
                          <a class="btn btn-success"href="edit_banner_status.php?id=<?php echo $ind_rslt['id'];?>">Yes</a>
                        </div>
                      </div>
                    </div>
                  </div> <!-- banner status button Modal end -->
              </td>
              <td><img class="thumbnail_img" src="uploads/banners/<?php echo $ind_rslt['banner_img']; ?>" alt="photo_<?php echo $ind_rslt['id']; ?>" ></td>
              <td><a href="single_banner_info.php?id=<?php echo $ind_rslt['id'];?>" class="btn btn-primary">View</a></td>
              <td><a href="edit_banner_info.php?id=<?php echo $ind_rslt['id'];?>" class="btn btn-info">Edit</a></td>
              <td>
              <!-- Button trigger modal -->
              <a href="delete_banner.php?id=<?php echo $ind_rslt['id'];?>" data-toggle="modal" data-target="#exampleModal_<?php echo $ind_rslt['id'];?>" class="btn btn-danger text-white">Delete</a>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal_<?php echo $ind_rslt['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <?php if ($ind_rslt['banner_status'] != 1): ?>
                          <h5 class="modal-title text-warning" id="exampleModalLabel">Are you sure you wanna delete your info?</h5>
                        <?php else: ?>
                          <h5 class="modal-title text-warning" id="exampleModalLabel">You can't delete when staus is active.</h5>
                        <?php endif; ?>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-footer">
                        <?php if ($ind_rslt['banner_status'] != 1): ?>
                          <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
                          <a class="btn btn-danger"href="delete_banner.php?id=<?php echo $ind_rslt['id'];?>">Yes</a>
                        <?php else: ?>
                          <button type="button" class="btn btn-dark" data-dismiss="modal">OK</button>
                        <?php endif; ?>
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
