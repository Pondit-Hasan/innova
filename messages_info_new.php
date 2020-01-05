<?php
require 'dashboard_part/header.php';
require 'db_connect.php';

$all_users_info_select = "SELECT * FROM messages WHERE status=0 ORDER BY id DESC";
$select_reslt = mysqli_query($db_connect, $all_users_info_select);
$unread_msg = "SELECT COUNT(*) as unread FROM messages WHERE status=0";
$unread_msg_reslt = mysqli_query($db_connect, $unread_msg);
$after_assoc_msg = mysqli_fetch_assoc($unread_msg_reslt);

?>

<div class="content-wrapper">
  <div class="row">
    <div class="col m-auto py-3 my-2">
      <div class="card bg-light mb-3">
        <div class="card-header text-center">
          <h3 class="bg_header py-3">All unread messages' information here!</h3>
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
          <?php if ($after_assoc_msg['unread'] > 0): ?>
            <table class="table table-striped table-responsive card-text">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Messages</th>
                  <th scope="col">Send Time</th>
                  <th class="text-center" scope="col" colspan="3">Action</th>
                </tr>
              </thead>
            <tbody>
              <?php
                foreach($select_reslt as $ind_rslt) { ?>
              <tr class="<?=($ind_rslt['status']==0) ? 'bg-info' : '' ?>">
                <th scope="row"><?php echo $ind_rslt['id']; ?></th>
                <td><?php echo $ind_rslt['name']; ?></td>
                <td><?php echo $ind_rslt['email']; ?></td>
                <td><?php echo $ind_rslt['message']; ?></td>
                <td><?php $time = $ind_rslt['send_time'];  echo timeAgo($time); ?> </td>
                <td><a href="single_message_info.php?id=<?php echo $ind_rslt['id'];?>" class="btn btn-primary">View</a></td>
                <td>
                <!-- Button trigger modal -->
                <?php if ($_SESSION['log_role']==1): ?>
                  <a href="delete_message.php?id=<?php echo $ind_rslt['id'];?>" data-toggle="modal" data-target="#exampleModal_<?php echo $ind_rslt['id'];?>" class="btn btn-danger text-white">Delete</a>
                <?php endif; ?>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal_<?php echo $ind_rslt['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure you wanna delete the message?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
                          <a class="btn btn-danger"href="delete_message.php?id=<?php echo $ind_rslt['id'];?>">Yes</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <?php } ?>
            </tbody>
            </table>
          <?php else: ?>
          <div class="bg-secondary">
            <p class="p-3">Well done! You have read all messages!</p>
          </div>
          <?php endif; ?>
      </div> <!-- card body end  -->
      </div>
    </div>
  </div> <!-- row end  -->

  <!-- get the dashboard footer  -->
  <?php require 'dashboard_part/footer.php'; ?>
