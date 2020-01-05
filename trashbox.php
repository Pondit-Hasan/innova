<?php
require 'dashboard_part/header.php';
require 'db_connect.php';

$all_users_info_select = "SELECT * FROM banners WHERE delete_status !=0";
$select_reslt = mysqli_query($db_connect, $all_users_info_select);
$all_msg = "SELECT * FROM messages WHERE delete_status !=0";
$all_msg_reslt = mysqli_query($db_connect, $all_msg);

?>
<div class="content-wrapper" style="padding: 0">
  <div class="row">
    <div class="col m-auto py-3 my-2">
      <div class="card bg-light mb-3">
        <div class="card-header text-center">
          <h3 class="bg_header py-3">All Trashes information here!</h3>
            <!-- success messege after update successfully completed!   -->
            <?php if(isset($_SESSION['restore_success'])){ ?>
              <h3 class="text-center text-success py-3">
              <div class="alert alert-success" role="alert">
                <?php
                  echo $_SESSION['restore_success'];
                  unset($_SESSION['restore_success']);
                ?>
              </div>
            <?php } ?>
            <!-- success messege after permanently delete selected data   -->
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
           <!--    banner trash       -->
            <div class="border-top p-2 mt-3">
                <h3>Banners' trashbox Info </h3>
            </div>
            <?php if($select_reslt -> num_rows != 0) { ?>
          <table class="table table-striped table-responsive card-text">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Banner Title</th>
                <th scope="col">Banner description</th>
                <th scope="col">Banner Button</th>
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
              <td><?php echo substr($ind_rslt['banner_desp'],0,50).' <span class="text-primary">.......</span? '; ?></td>
              <td><?php echo $ind_rslt['banner_btn']; ?></td>
              <td><img class="thumbnail_img" src="uploads/banners/<?php echo $ind_rslt['banner_img']; ?>" alt="photo_<?php echo $ind_rslt['id']; ?>" ></td>
              <td><a href="restore_data.php?id=banners-<?php echo $ind_rslt['id'];?>" class="btn btn-info">Restore</a></td>
                <td><a href="single_banner_info.php?id=<?php echo $ind_rslt['id'];?>" class="btn btn-primary">View</a></td>
              <td>
              <!-- Button trigger modal -->
              <a href="delete_banner.php?id=<?php echo $ind_rslt['id'];?>" data-toggle="modal" data-target="#exampleModal_<?php echo $ind_rslt['id'];?>" class="btn btn-danger text-white">Delete</a>
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
                          <a class=" text-white"href="delete_banner.php?id=<?php echo $ind_rslt['id'];?>">Yes</a>
                        </button>
                      </div>
                    </div>
                  </div>
                </div> <!-- Modal end -->
              </td>
            </tr>
            <?php } ?>
          </tbody>
          </table>
            <?php } else { ?>
                <div>
                    <p class="p-3 text-success">Wow! Clean your banner trash.</p>
                </div>
            <?php } ?>
           <!--    messages trash       -->
            <div class="border-top p-2 mt-3">
                <h3>Messages' trashbox Info </h3>
            </div>
            <?php if($all_msg_reslt -> num_rows != 0) { ?>
          <table class="table table-striped table-responsive card-text">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Messages</th>
                <th scope="col">Send Time</th>
                <th class="text-center" scope="col" colspan="3">Action</th>
              </tr>
            </thead>
          <tbody>
            <?php
              foreach($all_msg_reslt as $ind_msg_rslt) { ?>
            <tr>
              <td scope='row'><?php echo $ind_msg_rslt['name']; ?></td>
              <td><?php echo $ind_msg_rslt['email']; ?></td>
              <td><?php echo substr($ind_msg_rslt['message'],0,50).' <span class="text-primary">.......</span? '; ?></td>
              <td><?php echo $ind_msg_rslt['send_time']; ?></td>
              <td><a href="restore_data.php?id=messages-<?php echo $ind_msg_rslt['id'];?>" class="btn btn-info">Restore</a></td>
                <td><a href="single_message_info.php?id=<?php echo $ind_msg_rslt['id'];?>" class="btn btn-primary">View</a></td>
              <td>
              <!-- Button trigger modal -->
              <a href="delete_message.php?id=<?php echo $ind_msg_rslt['id'];?>" data-toggle="modal" data-target="#exampleModal_<?php echo $ind_msg_rslt['id'];?>" class="btn btn-danger text-white">Delete</a>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal_<?php echo $ind_msg_rslt['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <a class=" text-white"href="delete_message.php?id=<?php echo $ind_msg_rslt['id'];?>">Yes</a>
                        </button>
                      </div>
                    </div>
                  </div>
                </div> <!-- Modal end -->
              </td>
            </tr>
            <?php } ?>
          </tbody>
          </table>
            <?php } else { ?>
                <div>
                    <p class="p-3 text-success">Wow! Clean your message trash.</p>
                </div>
            <?php } ?>
      </div> <!-- card body end  -->
      </div>
    </div>
  </div> <!-- row end  -->

  <!-- get the dashboard footer  -->
  <?php require 'dashboard_part/footer.php'; ?>
